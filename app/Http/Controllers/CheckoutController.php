<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {

        $address = Address::where('users_id', auth()->user()->id)->get();
        $orders =  Order::where('users_id', auth()->user()->id)->with(['products'])->get();

        return view('pages.checkout', [
            'address' => $address,
            'orders' => $orders,
        ]);
    }
}
