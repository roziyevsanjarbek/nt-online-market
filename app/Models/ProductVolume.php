<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductVolume extends Model
{
    protected $fillable = [
        'name',
    ];
    protected static function boot()
    {
        parent::boot();
        static ::creating(function ($model){
            $model->slug=Str::slug($model->name);
        });
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'product_volume');
    }

}
