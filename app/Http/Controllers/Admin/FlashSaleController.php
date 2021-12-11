<?php

namespace App\Http\Controllers\Admin;

use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\DiscountFlashSale;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = FlashSale::all();
        return view('pages.admin.flash_sale.index', [
            "items" => $items,
            "menu" => "discount",
            "active" => "flash_sale"
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

        $validatedData = $request->validate([
            'discount_id' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);

        $validatedData['start_at'] = date("Y-m-d H:i:s", strtotime($request->start_at));
        $validatedData['finish_at'] = date("Y-m-d H:i:s", strtotime($request->finish_at));

        $dataFlashSale = [
            'start_at' => $validatedData['start_at'],
            'finish_at' => $validatedData['finish_at'],
        ];

        $idFlashSale = FlashSale::create($dataFlashSale);
        $dataDiscountFlashSale = [
            'discount_id' => $validatedData['discount_id'],
            'flash_sale_id' => $idFlashSale->id,
        ];

        foreach ($validatedData['discount_id'] as $data) {
            $dataDiscountFlashSale['discount_id'] = $data;
            DiscountFlashSale::create($dataDiscountFlashSale);
        }

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
        $item = FlashSale::with(['discounts', 'discounts.product'])->findOrFail($id);
        return view('pages.admin.flash_sale.detail', [
            "item" => $item,
            "menu" => "discount",
            "active" => "flash_sale"
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
        $item = FlashSale::with(['discounts.product'])->findOrFail($id);
        $discounts = Discount::all();
        // dd(count($item->discounts));
        return view('pages.admin.flash_sale.edit', [
            "item" => $item,
            "discounts" => $discounts,
            "menu" => "discount",
            "active" => "flash_sale"
        ]);
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
            'discount_id' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);

        $item = FlashSale::findOrFail($id);
        $validatedData['start_at'] = date("Y-m-d H:i:s", strtotime($request->start_at));
        $validatedData['finish_at'] = date("Y-m-d H:i:s", strtotime($request->finish_at));
        $item->update($validatedData);



        return redirect()->route('flash_sale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlashSale  $flashSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiscountFlashSale::where('flash_sale_id', $id)->delete();

        $item = FlashSale::findOrFail($id);
        $item->delete();

        return redirect()->route('flash_sale.index');
    }
}
