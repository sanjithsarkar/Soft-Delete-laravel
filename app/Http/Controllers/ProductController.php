<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Productlist = Product::orderBy('order', 'ASC')->get();
        return view('product.product_list')->with('Productlist', $Productlist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'pro_type' => 'required',
            'pro_quantity' => 'required',
            'pro_price' => 'required',
        ]);

        $data = new Product();
        $data->name = $request->name;
        $data->pro_type = $request->pro_type;
        $data->pro_quantity = $request->pro_quantity;
        $data->pro_price = $request->pro_price;
        //dd($data);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        dd($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Product $product)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $deleteProduct = Product::where('id', $product->id)->first();
        // $deleteProduct->delete();

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted Successfully!!');
    }

    public function update(Request $request)
    {
        $products = Product::all();

        foreach ($products as $product) {
            foreach ($request->order as $order) {
                if ($order['id'] == $product->id) {
                    $product->update(['order' => $order['position']]);
                    return response()->json($order['position']);
                }
            }
        }
    }

    public function restoreProduct()
    {

        //return view('product.delete_product');

        $Productlist = Product::onlyTrashed()->orderBy('order', 'ASC')->get();
        return view('product.delete_product')->with('Productlist', $Productlist);
    }

    public function restoreDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();

        if ($product) {
            $product->restore();
            return redirect()->route('products.index')->with('success', 'Product restored successfully!');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not found or already restored!');
        }
    }
}
