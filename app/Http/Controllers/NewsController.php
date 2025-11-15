<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with([
            'category',
            'media' => function ($q) {
                $q->where('model_type', 'App\Models\Blog\Post');
            }
        ])
        ->where('status', 'published');

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter tanggal
        if ($request->filled('start') && $request->filled('end')) {
            $query->whereBetween('created_at', [
                $request->start . ' 00:00:00',
                $request->end . ' 23:59:59'
            ]);
        } elseif ($request->filled('start')) {
            $query->whereDate('created_at', '>=', $request->start);
        } elseif ($request->filled('end')) {
            $query->whereDate('created_at', '<=', $request->end);
        }

        $news = $query->latest()->paginate(8)->withQueryString();

        $categories = Category::all();

        return view('components.public.pages.news.index', compact('news', 'categories'));
    }


    /**
     * Menampilkan detail berita berdasarkan slug.
     */
    public function show($slug)
    {
        // Cari berita berdasarkan slug, hanya yang published
        $news = Post::with(['category', 'media'])
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        $listNews = Post::with(['category', 'media'])
            ->where('status', 'published')
            ->latest('created_at')
            ->take(4)
            ->get();    

        return view('components.public.pages.news.show', compact('news', 'listNews'));
    }

}
