<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{

    protected $table = 'discount_product';

    protected $fillable = [
        'title',
        'discount',
        'expires_at'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
