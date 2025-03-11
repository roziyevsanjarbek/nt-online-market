<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductVolume extends Model {

    protected $fillable = ['product_id', 'volume_id'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function volume() {
        return $this->belongsTo(Volume::class);
    }
}

