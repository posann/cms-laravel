<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Blog\Pers;

class PersController extends Controller
{
    // public function index()
    // {
    //     $news = Pers::with(['media'])
    //         ->where('status', 'published')
    //         ->get();

    //     return view('components.public.pages.news.index', compact('news'));
    // }

    public function show($slug)
    {
        // Cari berita berdasarkan slug, hanya yang published
        $pers = Pers::with(['media'])
            ->where('status', 'published')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('components.public.pages.pers.index', compact('pers'));
    }
}
