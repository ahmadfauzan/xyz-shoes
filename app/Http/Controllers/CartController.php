<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('users_id', auth()->user()->id)->with(['products', 'products.discount'])->get();
        $address = Address::where('users_id', auth()->user()->id)->get();
        return view('pages.cart', [
            'carts' => $cart,
            'addresses' => $address,
            'active' => 'cart',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $type_size = $request->type_size;
        $size = $request->size;

        $validatedData = $request->validate([
            'products_id' => 'required',
            'users_id' => 'required',
            'qty' => 'required|numeric',
        ]);

        $validatedData['users_id'] = auth()->user()->id;
        $validatedData['type_size'] = $type_size;
        $validatedData['size'] = $size;

        $getCart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        if (count($getCart) > 0) {
            foreach ($getCart as $cart) {
                $product_id[] = $cart->products_id;
                if ($cart->products_id == $validatedData['products_id']) {

                    Cart::where('products_id', $cart->products_id)
                        ->update([
                            'qty' => DB::raw('qty + ' . $validatedData['qty'])
                        ]);
                    return redirect('/')->with('success', 'Product has been added to cart!');
                }
            }
            Cart::create($validatedData);

            return redirect('/')->with('success', 'Product has been added to cart!');
        }

        Cart::create($validatedData);

        return redirect('/')->with('success', 'Product has been added to cart!');
    }

    public function save2bag($id)
    {

        $data = [
            'products_id' => $id,
            'qty' => 1,
            'users_id' => auth()->user()->id,
            'type_size' => 'UK',
            'size' => '4',
        ];

        $getCart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        if (count($getCart) > 0) {
            foreach ($getCart as $cart) {
                $product_id[] = $cart->products_id;
                if ($cart->products_id == $id) {

                    Cart::where('products_id', $cart->products_id)
                        ->update([
                            'qty' => DB::raw('qty + ' . 1)
                        ]);
                    return redirect('/')->with('success', 'Product has been added to cart!');
                }
            }
            Cart::create($data);

            return redirect('/')->with('success', 'Product has been added to cart!');
        }


        Cart::create($data);

        return redirect('/')->with('success', 'Product has been added to cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {

        $data = Cart::findOrFail($cart);
        $data->delete();

        $getCart = Cart::where('users_id', auth()->user()->id)->with(['products'])->get();
        if (count($getCart) > 0) {
            return redirect('/cart');
        }
        return redirect('/');
    }
}
