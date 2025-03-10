<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;
    protected $fillable =
        [
            'product_id',
            'name',
            'description',
            'price',
            'sale_price',
            'category_id',
            'product_volume',
            'stock_quantity',
            'created_at',
            'updated_at'
        ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productVolume()
    {
        return $this->belongsTo(ProductVolume::class, 'product_volume');
    }
}
