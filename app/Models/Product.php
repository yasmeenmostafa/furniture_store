<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function order()
    {
        return $this->belongsTo(Order::class);
    }
    function orders()
    {
        return $this->hasMany(Order::class);
    }
    function product()
    {
        return $this->belongsTo(OrderProduct::class);
    }
}
