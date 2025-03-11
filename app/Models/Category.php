<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'category_id'];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
