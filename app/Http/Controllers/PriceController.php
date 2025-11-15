<?php

namespace App\Http\Controllers;

use App\Models\Price\PriceMenu;
use DB;
use Illuminate\Http\Request;


class PriceController extends Controller
{
    // public function index()
    // {

    //     $data = DB::table('price_menu as m')
    //         ->leftJoin('price_sub_menu as s', 's.price_menu_id', '=', 'm.id')
    //         ->leftJoin('price as p', 'p.sub_name_id', '=', 's.id')
    //         ->select(
    //             'm.id as menu_id',
    //             'm.name as menu_name',
    //             's.id as sub_id',
    //             's.sub_name as sub_name',
    //             'p.id as price_id',
    //             'p.price',
    //             'p.date_period'
    //         )
    //         ->get();

    //     $prices = $data->groupBy('menu_id')->map(function ($menuItems) {
    //         return [
    //             'menu_id'   => $menuItems->first()->menu_id,
    //             'menu_name' => $menuItems->first()->menu_name,
    //             'sub_menus' => $menuItems->groupBy('sub_id')->map(function ($subItems) {
    //                 return [
    //                     'sub_id'   => $subItems->first()->sub_id,
    //                     'sub_name' => $subItems->first()->sub_name,
    //                     'prices'   => $subItems->map(function ($item) {
    //                         return [
    //                             'price_id'    => $item->price_id,
    //                             'price'       => $item->price,
    //                             'date_period' => $item->date_period,
    //                         ];
    //                     })->filter(fn($p) => $p['price_id'] !== null)->values(),
    //                 ];
    //             })->values(),
    //         ];
    //     })->values();



    //     return view('components.public.pages.price.index', compact('prices'));
    // }

    public function index(Request $request)
    {

        $defaultStart = \Carbon\Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $defaultEnd   = \Carbon\Carbon::now()->toDateString();

        $query = DB::table('price_menu as m')
            ->leftJoin('price_sub_menu as s', 's.price_menu_id', '=', 'm.id')
            ->leftJoin('price as p', 'p.sub_name_id', '=', 's.id')
            ->select(
                'm.id as menu_id',
                'm.name as menu_name',
                's.id as sub_id',
                's.sub_name as sub_name',
                'p.id as price_id',
                'p.price',
                'p.date_period'
            );

        // 🔹 filter jika user pilih tanggal
        if ($request->filled(['start', 'end'])) {
            $query->whereBetween('p.date_period', [$request->start, $request->end]);
        }

        $data = $query->get();

        $prices = $data->groupBy('menu_id')->map(function ($menuItems) {
            return [
                'menu_id'   => $menuItems->first()->menu_id,
                'menu_name' => $menuItems->first()->menu_name,
                'sub_menus' => $menuItems->groupBy('sub_id')->map(function ($subItems) {
                    return [
                        'sub_id'   => $subItems->first()->sub_id,
                        'sub_name' => $subItems->first()->sub_name,
                        'prices'   => $subItems->map(function ($item) {
                            return [
                                'price_id'    => $item->price_id,
                                'price'       => $item->price,
                                'date_period' => $item->date_period,
                            ];
                        })->filter(fn($p) => $p['price_id'] !== null)->values(),
                    ];
                })->values(),
            ];
        })->values();

        return view('components.public.pages.price.index', compact('prices', 'defaultStart', 'defaultEnd'));
    }


}
