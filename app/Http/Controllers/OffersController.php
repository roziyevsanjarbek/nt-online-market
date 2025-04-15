<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use App\Models\Category;
use App\Models\Volume;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        // Faol chegirmalarni olish (hozirgi sanadan oldin boshlanib, hali tugamaganlar)
        $discounts = Discount::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        // Chegirmali mahsulotlarni olish
        $products = Product::whereHas('discounts', function ($query) {
            $query->where('start_date', '<=', now())
                ->where('end_date', '>=', now());
        })->with(['discounts', 'category', 'volume'])->get();

        // Chegirma nomi (agar bitta chegirma ko‘rsatmoqchi bo‘lsangiz)
        $discount_name = $discounts->isNotEmpty() ? $discounts->first()->name : 'Special Discount';

        // Boshqa kerakli ma'lumotlar (offers.blade.php da ishlatiladi)
        $parentCategories = Category::whereNull('parent_id')->get();
        $productsMenu = Product::take(5)->get(); // Mahsulotlar menyusi uchun
        $newArrivalProductFruits = Product::whereHas('category', fn($q) => $q->where('name', 'Fruits'))->take(3)->get();
        $newArrivalProductSpicesAndSnacks = Product::whereHas('category', fn($q) => $q->where('name', 'Spices & Snacks'))->take(3)->get();
        $categories = Category::all();

        // Agar $productsMenu bo‘sh bo‘lsa, bo‘sh array qaytarish
        $productsMenu = $productsMenu ?? collect([]);

        return view('pages.offers', compact(
            'parentCategories',
            'productsMenu',
            'newArrivalProductFruits',
            'newArrivalProductSpicesAndSnacks',
            'discount_name',
            'products',
            'categories',
            'discounts'
        ));
    }
}
