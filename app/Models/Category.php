<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'category_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images (){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function categories(){
        return $this->hasMany(Category::class, 'category_id');
    }

    public function productCount () {
        return $this->hasMany(Product::class, 'category_id')->count();
    }

}
