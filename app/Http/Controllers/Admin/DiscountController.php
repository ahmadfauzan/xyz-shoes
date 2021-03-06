<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Discount::with(['product'])->get();
        return view('pages.admin.discount.index', [
            "items" => $items,
            "menu" => "discount",
            "active" => "discount"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.discount.create', [
            'products' => $products,
            "menu" => "discount",
            "active" => "discount"
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
        $validatedData = $request->validate([
            'product_id' => 'required',
            'discount_percentage' => 'required|numeric',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);

        Discount::create($validatedData);
        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Discount::with(['product'])->findOrFail($id);

        return view('pages.admin.discount.edit', [
            'item' => $item,
            "menu" => "product",
            "active" => "category"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'discount_percentage' => 'required|numeric',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);


        $item = Discount::findOrFail($id);
        $item->update($validatedData);

        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Discount::findOrFail($id);
        $item->delete();

        return redirect()->route('discount.index');
    }
}
