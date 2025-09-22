<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Blog\Category;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::with(['category', 'media'])
            ->where('status', 'published')
            ->get();

        return view('components.public.pages.news.index', compact('news'));
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
