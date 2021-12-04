<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->belongsTo(order::class);
    }
    public function address()
    {
        return $this->belongsTo(address::class);
    }
}
