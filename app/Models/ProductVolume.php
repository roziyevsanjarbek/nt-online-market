<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVolume extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_volume');
    }

}
