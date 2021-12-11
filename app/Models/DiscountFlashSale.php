<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountFlashSale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "discount_flash_sale";
    protected $guarded = ['id'];
}
