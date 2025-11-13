<?php

namespace App\Http\Controllers;

use App\Models\Permit\PermitCategory;
use App\Models\Permit\PermitDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermitController extends Controller
{
    public function index(Request $request)
    {
        $categories = PermitCategory::where('is_active', true)
            ->orderBy('order_column')
            ->orderBy('name')
            ->get();

        $active = null;

        // Determine active category by 'category' query (category name) or first
        $categoryName = $request->string('category')->toString();
        if ($categories->isNotEmpty()) {
            if (!empty($categoryName)) {
                $active = $categories->firstWhere('name', $categoryName);
            }
            if (!$active) {
                $active = $categories->first();
            }
        }

        // Paginated documents for the active category
        $documents = collect();
        if ($active) {
            $documents = PermitDocument::where('permit_category_id', $active->id)
                ->where('is_active', true)
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->paginate(10)
                ->withQueryString();
        }

        return view(
            'components.public.pages.permit.index',
            compact('categories', 'active', 'documents')
        );
    }

    public function download($name)
    {
        // Download by document title, not slug
        $document = PermitDocument::where('title', $name)
            ->where('is_active', true)
            ->firstOrFail();

        $url = $document->download_url; // accessor defined in model
        if (!$url) {
            abort(404);
        }

        $document->increment('download_count');

        return redirect()->away($url);
    }

    public function satisfactionIndex()
    {
        return view('components.public.pages.permit.satisfaction-index');
    }
}