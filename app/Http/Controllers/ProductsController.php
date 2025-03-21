<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Volume;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        $filters = request()->input('filters');
        Product::query()
            ->orderBy(\request()->get('sort_order'), 'desc')
                ->whereHas('volume', function ($query) use ($filters) {
                    $query->whereHas('volumes', function ($query) use ($filters) {
                    $query->where('name', $filters);
                    });
                });
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
        $products= Product::query()
            ->orderBy('id', 'desc')
                ->limit(10)
                    ->get();
        $categories = Category::query()
            ->orderBy('id', 'desc')
                ->with(['images', 'parent'])
                    ->get();
        return view('product-filter', [
            'products' => $products,
            'parentCategories' => $parentCategories,
            'productsMenu' => $productsMenu,
            'categories' => $categories,
        ]); // ['products' => $products]
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $products)
    {
        //
    }
}
