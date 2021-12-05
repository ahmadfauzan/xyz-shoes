<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Size extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    // public function typeSize()
    // {
    //     return $this->belongsTo(TypeSize::class);
    // }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
