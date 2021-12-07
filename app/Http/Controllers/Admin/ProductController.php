<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\TypeSize;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with(['categories', 'type_sizes', 'sizes'])->get();

        return view('pages.admin.product.index', [
            "items" => $items,
            "menu" => "product",
            "active" => "product"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $type_sizes = TypeSize::all();
        return view('pages.admin.product.create', [
            "categories" => $categories,
            "type_sizes" => $type_sizes,
            "menu" => "product",
            "active" => "product"
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
            'name' => 'required',
            'categories_id' => 'required',
            'type_sizes_id' => 'required',
            'desc' => 'required',
            'stock' => 'required',
            'price' => 'required|numeric',
            'gender' => 'required',
            'donation' => 'required|numeric',
        ]);

        $validatedData['status'] = 1;

        $product = Product::create($validatedData);

        $input_sizes = $request->size;
        $i = 0;
        foreach ($input_sizes as $input_size) {
            $sizes[] = Size::updateOrCreate(
                ['size' => $request->size]
            );
        }

        $getSize = Size::whereIn('size', $request->size)->get();

        foreach ($getSize as $size) {
            ProductSize::create([
                'product_id' => $product->id,
                'size_id' => $size->id
            ]);
        }


        return redirect()->route('product.index');
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
        $item = Product::with('categories', 'type_sizes', 'sizes')->findOrFail($id);
        $categories = Category::all();
        $type_sizes = TypeSize::all();

        return view('pages.admin.product.edit', [
            'item' => $item,
            'categories' => $categories,
            'type_sizes' => $type_sizes,
            "menu" => "product",
            "active" => "product"
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
            'name' => 'required',
            'categories_id' => 'required',
            'type_sizes_id' => 'required',
            'desc' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'price' => 'required|numeric',
            'gender' => 'required',
            'donation' => 'required|numeric',
        ]);


        $product = Product::findOrFail($id);

        $product->update($validatedData);

        $input_sizes = $request->size;
        $i = 0;
        foreach ($input_sizes as $input_size) {
            $sizes[] = Size::updateOrCreate(
                ['size' => $request->size]
            );
        }

        $getSize = Size::whereIn('size', $request->size)->get();

        foreach ($getSize as $size) {
            ProductSize::updateOrCreate([
                'product_id' => $id,
                'size_id' => $size->id
            ]);
        }


        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductSize::where('product_id', $id)->delete();
        $item = Product::findOrFail($id);
        $item->delete();
        return redirect()->route('product.index');
    }

    public function size($id, $product_id)
    {
        // $item = Size::findOrFail($id);
        // $item->delete();

        ProductSize::where('size_id', $id)
            ->where('product_id', $product_id)
            ->delete();


        return redirect()->route('product.edit', $product_id);
    }
}
