<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'category_id',
        'title',
        'buy_price',
        'regular_price',
        'price',
        'rating',
        'shortdes',
        'tag',
        'quantity',
        'sales_qty',
        'stock_qty',
        'product_info',
        'image',
        'user_id',
        'status',
    ];
}
