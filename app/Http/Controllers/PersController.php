<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Blog\Pers;

class PersController extends Controller
{
    public function index()
    {
        $news = Pers::with(['media'])
            ->where('status', 'published')
            ->get();

        return view('components.public.pages.news.index', compact('news'));
    }
}
