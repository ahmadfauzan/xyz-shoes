<?php

use App\Models\Product;

function is_discount($product_id, $dicount_product_id, $start_at, $finish_at)
{
    $now = Carbon\Carbon::now();
    $date = $now->toDateString();
    if ($product_id == $dicount_product_id) {
        if ($start_at <= $date && $finish_at >= $date) {
            return ('true');
        } else {
            return ('expired');
        }
    } else {
        return ('false');
    }
}


function calc_discount($price, $discount)
{
    return $price - $price * $discount / 100;
}
