<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $display = Product::latest()->with(['categories', 'type_sizes', 'sizes', 'ratings'])->get();
        $cart = '';
        if (Auth::check()) {
            $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        }

        return view('pages.home', [
            'display' => $display,
            'active' => 'home',
            'cart' => $cart,
        ]);
    }

    public function men()
    {

        $products = Product::with(['categories', 'discounts'])
            ->where('gender', 'men')
            ->get();

        $categories = Category::all();
        $cart = '';
        if (Auth::check()) {
            $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        }

        return view('pages.mens', [
            'products' => $products,
            'cart' => $cart,
            'categories' => $categories,
            'active' => 'men',
        ]);
    }

    public function women()
    {

        $products = Product::with(['categories', 'discounts'])
            ->where('gender', 'women')
            ->get();
        $categories = Category::all();
        $cart = '';
        if (Auth::check()) {
            $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        }

        return view('pages.womens', [
            'products' => $products,
            'cart' => $cart,
            'categories' => $categories,
            'active' => 'women',
        ]);
    }

    public function redirect()
    {
        return redirect('/')->withErrors('Login required', 'auth');
    }
}
