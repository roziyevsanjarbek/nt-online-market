<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountWeight extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_price',
        'weight',
        'unit',
        'discount_start',
        'discount_end',
    ];

    protected $casts = [
        'discount_start' => 'date',
        'discount_end' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

