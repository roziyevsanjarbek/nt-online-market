<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;

    protected $table = 'Categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
    ];


    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
