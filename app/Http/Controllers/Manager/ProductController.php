<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Image;
use App\ProductType;
use Illuminate\Support\Str;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $product_type = ProductType::all();

        return view('backend.products.index', compact('product', 'product_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = ProductType::all();

        return view('backend.products.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'id_type' => $request->id_type,
            'unit_price' => $request->unit_price,
            'promotion_price' => $request->promotion_price,
            'unit' => $request->unit,
            'new' => $request->new,
            'image' => $request->image->getClientOriginalName(),
        ]);
        // dd($request->image->getClientOriginalName());
        if($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->move(config('app.link_product'), $filename);
        }
        // dd($product);
        $product->save();

        return view('backend.home', compact('product'))->with('success', __('create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $product_type = ProductType::all();

        return view('backend.products.edit', compact('product', 'product_type'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = $request->new;
        $product->save();

        return redirect()->route('products.index')->with('success', __('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', __('delete_success'));
    }
}
