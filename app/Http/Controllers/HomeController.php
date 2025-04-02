<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Product;
use App\Models\Team;
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
        $insPosts = Post::query()
            ->orderBy('id', 'desc')
                ->with('insPostCategory')
                    ->limit(10)
                        ->get();
        $parentCategories = Category::query()
            ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                    ->limit(4)
                        ->with('categories')
                            ->get();
        $productsMenu = Category::query()
            ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                    ->with('categories')
                        ->get();
        $products = Product::query()
            ->orderBy('id', 'desc')
                ->limit(10)
                    ->get();
        $newArrivalProductFruits = Product::whereHas('category', function ($query) {
            $query->where('name', 'Fruits');
                 })->orderBy('id', 'desc')->limit(4)->get();

        $newArrivalProductVegetables = Product::whereHas('category', function ($query) {
            $query->where('name', 'Vegetables');
                 })->orderBy('id', 'desc')->limit(4)->get();

        $newArrivalProductSpicesAndSnacks = Product::whereHas('category', function ($query) {
            $query->whereIn('name', ['Snack', 'Spices']);
        })->orderBy('id', 'desc')->limit(4)->get();





        $teams = Team::query()
            ->orderBy('id', 'desc')
                ->limit(10)
                    ->get();
        return view('home',[
            'topBanners' => $topBanners,
            'midBanner' => $midBanner,
            'bottomBanner' => $bottomBanner,
            'oneBottomBanners' => $oneBottomBanners,
            'categories' => $categories,
            'latestPosts' => $latestPosts,
            'parentCategories' => $parentCategories,
            'insPosts' => $insPosts,
            'products' => $products,
            'productsMenu' => $productsMenu,
            'teams' => $teams,
            'newArrivalProductFruits' => $newArrivalProductFruits,
            'newArrivalProductSpicesAndSnacks' => $newArrivalProductSpicesAndSnacks,
            'newArrivalProductVegetables' => $newArrivalProductVegetables,
        ]);
    }


    public function show(string $id)
    {
        $parentCategories = Category::query()
            ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                    ->limit(4)
                        ->with('categories')
                            ->get();
        return view('product-filter',[
            'parentCategories' => $parentCategories
        ]);
    }
    public function exit()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
