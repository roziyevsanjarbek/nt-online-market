<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilgrim extends Model
{
    protected  $fillable=[
        'pilgrim_count',
    ];

    public function pilgrim()
    {
        return $this->belongsToMany(Pilgrim::class);
    }
}
