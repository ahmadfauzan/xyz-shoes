<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $selects = $request->select;
        $i = 0;

        foreach ($selects as $s) {
            $qty[] = $request->qty[$s];
            $products_id[] = $request->products_id[$s];
            $users_id[] = $request->users_id[$s];
            $price[] = $request->price[$s];
            $data = [
                'products_id' => $products_id[$i],
                'qty' => $qty[$i],
                'users_id' => $users_id[$i],
                'price' => $price[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
            Order::insert($data);
            $i++;
        }


        return redirect('checkout/')->with('success');
    }

    public function buyNow($id)
    {
        $product = Product::findOrfail($id);
        $data = [
            'users_id' => auth()->user()->id,
            'products_id' => $id,
            'qty' => 1,
            'price' => $product->price
        ];
        Order::create($data);

        return redirect('checkout/')->with('success');
    }
}
