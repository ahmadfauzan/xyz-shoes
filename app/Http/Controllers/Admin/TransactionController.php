<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Donation;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with(['users', 'payments'])->get();
        // dd($items->get());
        return view('pages.admin.transaction.index', [
            "items" => $items,
            "menu" => "transaction",
            "active" => "transaction"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discounts = Discount::with(['product'])->get();
        return view('pages.admin.flash_sale.create', [
            'discounts' => $discounts,
            "menu" => "discount",
            "active" => "flash_sale"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'discounts_id' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);

        $validatedData['start_at'] = date("Y-m-d H:i:s", strtotime($request->start_at));
        $validatedData['finish_at'] = date("Y-m-d H:i:s", strtotime($request->finish_at));
        FlashSale::create($validatedData);
        return redirect()->route('flash_sale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Transaction::with(['users', 'payments', 'orders', 'orders.products'])->findOrFail($id);

        return view('pages.admin.transaction.detail', [
            "items" => $items,
            "menu" => "transaction",
            "active" => "transaction"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);


        $item = Transaction::findOrFail($id);
        $item->update($validatedData);

        $donation = 0;
        if ($validatedData['status'] == 3) {
            $products = Transaction::with(['orders.products'])->findOrFail($id);
            foreach ($products->orders as $order) {
                $donation += $order->products->donation * $order->qty / 100;
            }

            $data = [
                'transaction_id' => $id,
                'amount' => $item->total_price * $donation,
            ];
            Donation::create($data);
            return redirect()->route('transaction.index');
        }

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
