<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\FlashSale;
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

        $items = Product::with(['categories', 'type_sizes', 'sizes', 'ratings',  'discount.flash_sales'])->get();
        // dd($items);
        $flash_sale = FlashSale::latest()->limit(1)->get();
        $cart = '';
        if (Auth::check()) {
            $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin/dashboard');
            }
        }

        return view('pages.home', [
            'items' => $items,
            'is_detail' => false,
            'flash_sale' => $flash_sale,
            'active' => 'home',
            'cart' => $cart,
        ]);
    }

    public function men()
    {

        $products = Product::with(['categories', 'discount'])
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

        $products = Product::with(['categories', 'discount'])
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

    public function detail($id)
    {
        $items = Product::with(['categories', 'type_sizes', 'sizes', 'ratings',  'discount.flash_sales'])->get();
        $detail = Product::with(['categories', 'type_sizes', 'sizes', 'ratings',  'discount.flash_sales'])->findOrFail($id);
        // dd($detail);

        $flash_sale = FlashSale::latest()->limit(1)->get();
        $cart = '';
        if (Auth::check()) {
            $cart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
            if (Auth::user()->hasRole('admin')) {
                return redirect('/admin/dashboard');
            }
        }

        return view('pages.home', [
            'items' => $items,
            'detail' => $detail,
            'is_detail' => true,
            'flash_sale' => $flash_sale,
            'active' => 'home',
            'cart' => $cart,
        ]);
    }

    public function redirect()
    {
        return redirect('/')->withErrors('Login required', 'auth');
    }
}
