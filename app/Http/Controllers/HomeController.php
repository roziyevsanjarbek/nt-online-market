<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Post;
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
                ->latest('updated_at')
                    ->first();
        $bottomBanner = Banner::query()
            ->where('position', 'bottom')
                ->latest('updated_at')
                    ->first();
        $oneBottomBanners = Banner::query()
            ->where('position', 'one_bottom')
                ->latest('updated_at')
                    ->limit(2)
                        ->get();
        $categories = Category::query()
            ->orderBy('id', 'desc')
                ->with(['images', 'parent'])
                    ->get();
        $latestPosts = Post::query()
            ->orderBy('id', 'desc')
                ->with('postCategory')
                    ->limit(10)
                        ->get();
        $parentCategories = Category::query()
            ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                    ->limit(4)
                        ->with('categories')
                            ->get();
        return view('home',[
            'topBanners' => $topBanners,
            'midBanner' => $midBanner,
            'bottomBanner' => $bottomBanner,
            'oneBottomBanners' => $oneBottomBanners,
            'categories' => $categories,
            'latestPosts' => $latestPosts,
            'parentCategories' => $parentCategories
        ]);
    }


    public function show(string $id)
    {

    }

}
