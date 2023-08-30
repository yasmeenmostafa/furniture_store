<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $guarded=[];
    function orders()
    {
        return $this->belongsTo(Order::class);
    }
    function product()
    {
        return $this->hasMany(Product::class);
    }


}
