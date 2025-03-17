<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $top_banners = Banner::query()
            ->where('position', 'top')
                ->get();
        $midBanner = Banner::where('position', 'middle')
            ->latest('updated_at')
                ->first();
        $addBanners = Banner::where('position','ad')
            ->latest('updated_at')
                ->limit(2)
                    ->get();
        $bottomBanner = Banner::where('position','bottom')
                ->latest('updated_at')
                    ->first();
        $categories = Category::query()
            ->orderBy('id', 'desc')
                ->with(['images', 'parent'])
                    ->get();
        $latestPosts = Posts::query()
            ->orderBy('id', 'desc')
                ->with('postCategory')
                    ->limit(10)
                        ->get();
        return view('home', [
            'top_banners' => $top_banners,
            'midBanner' => $midBanner,
            'addBanners' => $addBanners,
            'bottomBanner' => $bottomBanner,
            'categories' => $categories,
            'latestPosts' => $latestPosts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
