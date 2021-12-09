<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\OrderTransaction;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users_id' => 'required',
            'address_id' => 'required',
            'total_shipping' => 'required',
            'total_price' => 'required|numeric'
        ]);

        $validatedData['status'] = 1; // not verified

        $data = Transaction::create($validatedData);


        $transaction_id = $data->id;
        $orders_id = $request->orders_id;

        $i = 0;
        foreach ($orders_id as $id) {
            $order_id[] = $id;
            $order_transaction = [
                'order_id' => $order_id[$i],
                'transaction_id' => $transaction_id,
            ];
            OrderTransaction::create($order_transaction);
            $i++;
        }

        $data2 = [
            'account_name' => $request->account_name,
            'amount' => $request->amount,
            'provider' => $request->provider,
            'transactions_id' => $transaction_id,
        ];
        $data2['proof_of_payment'] = $request->file('proof_of_payment');

        $validatedData2 = Validator::make($data2, [
            'account_name' => 'required',
            'transactions_id' => 'required',
            'amount' => 'required|numeric',
            'provider' => 'required',
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $validatedData2->proof_of_payment = $request->file('proof_of_payment')->getClientOriginalName();



        if ($image = $request->file('proof_of_payment')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/', $request->file('proof_of_payment'), $profileImage);
        }


        if ($validatedData2->fails()) {
            return redirect('/checkout')->withErrors($validatedData2, 'payment');
        }

        Payment::create([
            "account_name" => $validatedData2->validated()['account_name'],
            "transactions_id" => $validatedData2->validated()['transactions_id'],
            "amount" => $validatedData2->validated()['amount'],
            "provider" => $validatedData2->validated()['provider'],
            "proof_of_payment" => $profileImage,
        ]);

        $carts_id = $request->carts_id;

        Cart::whereIn('id', $carts_id)->delete();

        Order::whereIn('id', $orders_id)
            ->update(['status' => 'already paid']);

        return redirect('/')->with('success', 'Transaction successful, your shoes will be sent');
    }
}
