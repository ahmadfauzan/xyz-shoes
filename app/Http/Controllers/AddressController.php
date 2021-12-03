<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $validatedData = $request->validate([
        //     'users_id' => 'required',
        //     'label' => 'required',
        //     'phone_number' => 'required',
        //     'province' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'postal_code' => 'required|numeric',
        // ]);

        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
            'label' => 'required',
            'phone_number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return redirect('cart/')->withErrors($validator, 'address');
        } else {
            Address::create($validator->validated());
            return redirect('cart/')->with('success');
        }
        // if (!$validatedData) {
        //     return dd('errorrr');
        // } else {
        //     $validatedData['users_id'] = auth()->user()->id;
        //     Address::create($validatedData);
        //     return redirect('cart/')->with('success');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
    }
}
