<?php

namespace App\Http\Controllers;

use App\Models\ProductStatuses;
use Illuminate\Http\Request;

class ProductStatusesController extends Controller
{
    // Wishlistga mahsulot qo‘shish yoki olib tashlash
    public function toggleWishlist(Request $request) {
        $data = ProductStatuses::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['like' => !$request->like]
        );

        return response()->json(['message' => 'Wishlist yangilandi', 'data' => $data]);
    }

    // Cart'ga mahsulot qo‘shish yoki olib tashlash
    public function toggleCart(Request $request) {
        $data = ProductStatuses::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['shopping' => !$request->shopping]
        );

        return response()->json(['message' => 'Cart yangilandi', 'data' => $data]);
    }

    // Wishlistni ko‘rish
    public function wishlist() {
        $wishlist = ProductStatuses::where('user_id', auth()->id())->where('like', true)->with('product')->get();
        return response()->json($wishlist);
    }

    // Cartni ko‘rish
    public function cart() {
        $cart = ProductStatuses::where('user_id', auth()->id())->where('shopping', true)->with('product')->get();
        return response()->json($cart);
    }
}
