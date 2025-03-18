<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topBanners = Banner::query()
            ->where('position', 'top')
                ->get();
        $midBanner = Banner::query()
            ->where('position', 'middle')
                ->orderBy('created_at', 'desc')
                    ->first();

        $bottomBanner = Banner::query()
            ->where('position', 'bottom')
                ->orderBy('created_at', 'desc')
                    ->first();
        $oneBottomBanners = Banner::query()
            ->where('position', 'one_bottom')
                ->get();

        return view('home',[
            'topBanners' => $topBanners,
            'midBanner' => $midBanner,
            'bottomBanner' => $bottomBanner,
            'oneBottomBanners' => $oneBottomBanners

        ]);
    }


    public function show(string $id)
    {
        //
    }

}
