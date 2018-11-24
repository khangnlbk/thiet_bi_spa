<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use Illuminate\Support\Str;
use App\Http\Requests\ProductTypeFormRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_type = ProductType::all();

        return view('backend.product_types.index', compact('product_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_type = ProductType::all();

        return view('backend.product_types.create', compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeFormRequest $request)
    {
        $product_type = new ProductType([
            'name' => $request->name,
            'parent_type' => $request->parent_type,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        $product_type->save();
        return view('backend.product_types.show', compact('product_type'))->with('success', __('create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_type = ProductType::findOrFail($id);

        return view('backend.product_types.show', compact('product_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_type = ProductType::findOrFail($id);

        return view('backend.product_types.edit', compact('product_type'));
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
        $product_type = ProductType::findOrFail($id);
        $product_type->name = $request->name;
        $product_type->category = $request->category;
        $product_type->image = $request->image;
        $product_type->description = $request->description;
        $product_type->save();

        return redirect()->route('product_types.index')->with('success', __('update_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_type = ProductType::findOrFail($id);
        $product_type->delete();

        return redirect()->back()->with('success', __('delete_success'));
    }

}
