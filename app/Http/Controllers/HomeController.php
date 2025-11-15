<?php

namespace App\Http\Controllers;

use App\Models\Blog\Pers;
use App\Models\Blog\Post;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $news = Post::with(['category', 'media'])
            ->where('status', 'published')
            ->latest('created_at')
            ->take(4)
            ->get();

        $pers = Pers::with(['media'])
            ->where('status', 'published')
            ->latest('created_at')
            ->take(4)
            ->get();

        return view('components.public.pages.home.index', compact('news', 'pers'));
    }

    public function menus() {
        $menus = DB::table('menus')->get();

        return $menus;
    }
}
