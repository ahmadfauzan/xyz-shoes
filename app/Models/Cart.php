<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsTo(product::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
