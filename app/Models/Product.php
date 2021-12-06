<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        return $this->belongsToMany(Size::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
