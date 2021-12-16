<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Transaction;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsTo(product::class);
    }


    public function transactions()
    {
        return $this->belongsToMany(Transaction::class);
    }
}
