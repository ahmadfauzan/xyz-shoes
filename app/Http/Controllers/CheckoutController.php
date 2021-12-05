<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {

        $address = Address::where('users_id', auth()->user()->id)->get();
        $getOrders =  Order::where('users_id', auth()
            ->user()->id)
            ->with(['products'])->get();

        $orders = $getOrders->whereNotIn('status', 'already paid');

        $carts = [];

        if (count($orders) > 0) {
            foreach ($orders as $order) {
                $product_id[] = $order->products_id;
            }

            $getCart = Cart::where('users_id', auth()->user()->id)
                ->with(['products'])
                ->whereIn('products_id', $product_id)
                ->get();
            $carts = $getCart;
            // dd(count($carts));
        }
        return view('pages.checkout', [
            'address' => $address,
            'orders' => $orders,
            'carts' => $carts,
        ]);
    }
}
