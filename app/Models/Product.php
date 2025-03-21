<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'old_price', 'weight', 'color', 'rating'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function volume ()
    {
        return $this->belongsTo(ProductVolume::class, 'volume_id');
    }

    public function images (){
        return $this->morphMany(Image::class, 'imageable', 'imageable_type', 'imageable_id');
    }
}
