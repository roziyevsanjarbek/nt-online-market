<?php

namespace App\Services;

    use App\Models\Banner;
    use App\Models\Category;
    use App\Models\Discount;
    use App\Models\Post;
    use App\Models\Product;
    use App\Models\Team;

class HomeService
{
    public function getHomeData()
    {
        return [
            'topBanners' => Banner::query()
                ->where('position', 'top')
                ->get(),

            'midBanner' => Banner::query()
                ->where('position', 'middle')
                ->latest('updated_at')
                ->first(),

            'bottomBanner' => Banner::query()
                ->where('position', 'bottom')
                ->latest('updated_at')
                ->first(),

            'oneBottomBanners' => Banner::query()
                ->where('position', 'one_bottom')
                ->latest('updated_at')
                ->limit(2)
                ->get(),

            'categories' => Category::query()
                ->orderBy('id', 'desc')
                ->with(['images', 'parent'])
                ->get(),

            'latestPosts' => Post::query()
                ->orderBy('id', 'desc')
                ->with('postCategory')
                ->limit(10)
                ->get(),

            'insPosts' => Post::query()
                ->orderBy('id', 'desc')
                ->with('insPostCategory')
                ->limit(10)
                ->get(),

            'parentCategories' => Category::query()
                ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                ->limit(4)
                ->with('categories')
                ->get(),

            'productsMenu' => Category::query()
                ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                ->with('categories')
                ->get(),

            'products' => Product::query()
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get(),


            $parentCategories = Category::query()
                ->whereNull('parent_id')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->with('categories')
                ->get(),
            'discount_name' => Discount::query()->value('name'),
            'discount_price' => Discount::query()->value('discount_price'),
            'start_date' => Discount::query()->value('start_date'),
            'end_date' => Discount::query()->value('end_date'),


            'newArrivalProducts' => Product::whereHas('category', function ($query) use ($parentCategories) {
                $query->whereIn('id', $parentCategories->pluck('id'));
                })->orderBy('id', 'desc')->limit(4)->get(),


        'groupTeam' => Team::query()
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get(),
        ];
    }


}
