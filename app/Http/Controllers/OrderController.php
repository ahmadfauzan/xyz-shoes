<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'products_id' => 'required',
            'users_id' => 'required',
            'qty' => 'required|numeric',
        ]);

        $validatedData['users_id'] = auth()->user()->id;
        Cart::create($validatedData);

        return redirect('/')->with('success', 'Product has been added to cart!');
    }
}
