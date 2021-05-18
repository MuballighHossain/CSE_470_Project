<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();

        return view('admin.product.list')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'subtag' => 'required',
            'slug' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'cat' => 'required',
            'properties' => 'required',
            'ingredients' => 'required',
            'direction' => 'required',
            'image' => 'image|nullable|max:1999',
        ]);

        $product = new product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->cat = $request->input('cat');
        $product->subtag = $request->input('subtag');
        $product->slug = $request->input('slug');
        $product->properties = $request->input('properties');
        $product->ingredients = $request->input('ingredients');
        $product->direction = $request->input('direction');
        $product->stock = $request->input('stock');
        $product->size = $request->input('size');

        if ($request->hasfile('image')) {
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/uploads', $fileNameToStore);
            $product->image = $fileNameToStore;
        }
        $product->save();
        return redirect('admin/product')->with('success', 'Product Creation Completed !');
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
        $product = product::find($id);
        return view('admin.product.edit')->with('product', $product);
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
        $this->validate($request, [
            'name' => 'required',
            'name' => 'required',
            'price' => 'required',
            'subtag' => 'required',
            'slug' => 'required',
            'stock' => 'required',
            'size' => 'required',
            'properties' => 'required',
            'ingredients' => 'required',
            'direction' => 'required',
            'image' => 'image|max:1999',
        ]);

        $product = product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->subtag = $request->input('subtag');
        $product->slug = $request->input('slug');
        $product->properties = $request->input('properties');
        $product->ingredients = $request->input('ingredients');
        $product->direction = $request->input('direction');
        $product->stock = $request->input('stock');
        $product->size = $request->input('size');

        if ($request->hasfile('image')) {
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/uploads', $fileNameToStore);
            $product->image = $fileNameToStore;
        }

        $product->save();
        return redirect('admin/product')->with('success', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product')->with('success', 'Product Deleted!');
    }
}
