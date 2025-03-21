<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->orderBy('id', 'desc')
                ->with(['images', 'parent'])
                    ->get();
        $latestPosts = Posts::query()
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
        return view('shop-page',[
            'categories' => $categories,
            'latestPosts' => $latestPosts,
            'parentCategories' => $parentCategories,
        ]);
    }
}
