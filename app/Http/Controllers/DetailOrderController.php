<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Payment;

class DetailOrderController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users_id' => 'required',
            'address_id' => 'required',
            'orders_id' => 'required,',
            'total_shipping' => 'required',
            'total_price' => 'required|numeric'
        ]);

        DetailOrder::create($validatedData);

        $detail_order = DetailOrder::where('users_id', auth()->user()->id)->get();

        $detail_order_id = $detail_order[0]->id;
        $validatedData2['detail_orders_id'] = $detail_order_id;

        $validatedData2 = $request->validate([
            'account_name' => 'required',
            'detail_orders_id' => 'required',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($image = $request->file('pof')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validatedData2['proof_of_payment'] = "$profileImage";
        }

        Payment::create($validatedData2);


        return redirect('/')->with('success', 'Transaction successful, your shoes will be sent');
    }
}
