<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'category_id'];

    public function parent () {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function products () {
        return $this->hasMany(Product::class);
    }
    public function images () {
        return $this->morphMany(Image::class, 'imageable','imageable_type','imageable_id');
        //imageable_type=App\Models\Product, imageable_id=product_id
    }
}
