<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $display = Product::latest()->with(['categories', 'type_sizes', 'sizes', 'ratings'])->limit(1)->get();
        $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();

        return view('pages.home', [
            'display' => $display,
            'cart' => $cart,
        ]);
    }
}
