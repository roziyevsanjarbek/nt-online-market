<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountProductController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'discount_id' => 'required|exists:discounts,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($validatedData['product_id']);
        $discount = Discount::findOrFail($validatedData['discount_id']);

        // Mahsulotga chegirma qo‘shish
        $product->discounts()->syncWithoutDetaching([$discount->id]);

        return redirect()->route('offers')->with('success', 'Discount applied to product successfully.');
    }
}
