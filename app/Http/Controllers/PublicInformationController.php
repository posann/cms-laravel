<?php

namespace App\Http\Controllers;

use App\Models\PublicInformation\PerformanceCategory;
use App\Models\PublicInformation\PerformanceDocument;
use App\Models\PublicInformation\Faq;
use App\Models\PublicInformation\PublicMedia;
use Illuminate\Http\Request;

class PublicInformationController extends Controller
{
    public function performance(Request $request)
    {
        // Load active categories (ordered)
        $categories = PerformanceCategory::where('is_active', true)
            ->orderBy('order_column')
            ->orderBy('name')
            ->get();

        // Determine active category by 'category' query (category name) or first
        $active = null;
        $categoryName = $request->string('category')->toString();
        if ($categories->isNotEmpty()) {
            if (!empty($categoryName)) {
                $active = $categories->firstWhere('name', $categoryName);
            }
            if (!$active) {
                $active = $categories->first();
            }
        }

        // Year filter
        $selectedYear = $request->integer('year') ?: null;

        // Available years for the active category (distinct YEAR(published_at))
        $availableYears = PerformanceDocument::where('is_active', true)
            ->whereNotNull('published_at')
            ->when($active, function ($q) use ($active) {
                $q->where('performance_category_id', $active->id);
            })
            ->selectRaw('DISTINCT YEAR(published_at) as year')
            ->orderByDesc('year')
            ->pluck('year');

        // Base query for documents under active category
        $query = PerformanceDocument::query()
            ->where('is_active', true)
            ->when($active, fn($q) => $q->where('performance_category_id', $active->id))
            ->orderByDesc('published_at')
            ->orderByDesc('id');

        if (!empty($selectedYear)) {
            $query->whereYear('published_at', $selectedYear);
        }

        $documents = $query->paginate(10)->withQueryString();

        return view('components.public.pages.public-information.performance', [
            'categories' => $categories,
            'active' => $active,
            'documents' => $documents,
            'availableYears' => $availableYears,
            'selectedYear' => $selectedYear,
        ]);
    }

    public function download($name)
    {
        // Download by document title, not slug
        $document = PerformanceDocument::where('title', $name)
            ->where('is_active', true)
            ->firstOrFail();

        $url = $document->download_url; // accessor defined in model
        if (!$url) {
            abort(404);
        }

        $document->increment('download_count');

        return redirect()->away($url);
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('order_column')
            ->orderBy('id')
            ->get();

        return view('components.public.pages.public-information.faq', compact('faqs'));
    }

    public function photos(Request $request)
    {
        $photos = PublicMedia::active()
            ->where('type', 'photo')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        return view('components.public.pages.public-information.photos', compact('photos'));
    }

    public function videos(Request $request)
    {
        $videos = PublicMedia::active()
            ->where('type', 'video')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(9) // 3 columns x 3 rows per page
            ->withQueryString();

        return view('components.public.pages.public-information.videos', compact('videos'));
    }

    public function photoShow(string $slug)
    {
        $photo = PublicMedia::active()
            ->where('type', 'photo')
            ->where('slug', $slug)
            ->where(function ($q) {
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->firstOrFail();

        $related = PublicMedia::active()
            ->where('type', 'photo')
            ->where('id', '!=', $photo->id)
            ->orderByDesc('published_at')
            ->limit(8)
            ->get();

        return view('components.public.pages.public-information.photo-show', [
            'item' => $photo,
            'related' => $related,
        ]);
    }

    public function videoShow(string $slug)
    {
        $video = PublicMedia::active()
            ->where('type', 'video')
            ->where('slug', $slug)
            ->where(function ($q) {
                $q->where('status', 'published')->orWhereNull('status');
            })
            ->firstOrFail();

        $related = PublicMedia::active()
            ->where('type', 'video')
            ->where('id', '!=', $video->id)
            ->orderByDesc('published_at')
            ->limit(6)
            ->get();

        return view('components.public.pages.public-information.video-show', [
            'item' => $video,
            'related' => $related,
        ]);
    }
}