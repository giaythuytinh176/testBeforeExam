<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->title;
        $products = DB::table('products')->where('name', 'LIKE', "%{$search}%")->get();
        return view("backend.index", compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("backend.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequestProduct $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $product->fill($request->all());
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
            $product->save();
            return redirect()->route("admin.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        return view("backend.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequestProduct $request, Product $product)
    {
        $product = $product::findOrFail($request->id);
        if (!$request->hasFile('image') && public_path('images') . $request->imageName) {
            $imageName = $request->imageName;
        } else {
            $product->fill($request->all());
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }
        $product->image = $imageName;
        $product->save();
        return redirect()->route("admin.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = $product::findOrFail($id);
        $product->delete();
        return redirect()->route("admin.index");
    }
}
