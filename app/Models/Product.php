<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function type_sizes()
    {
        return $this->belongsTo(TypeSize::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function sizes()
    {
        // return $this->belongsToMany(Size::class, 'product_size');
        return $this->belongsToMany(Size::class);
    }
}
