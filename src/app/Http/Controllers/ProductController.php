<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::when(isset($request->category_id), function($query) use ($request) {
            $query->where('category_id', $request->category_id);
        })->when(isset($request->keyword), function($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->keyword}%");
            $query->orWhere('maker', 'LIKE', "%{$request->keyword}%");
        })->when(isset($request->min_price), function($query) use ($request) {
            $query->where('price', '>=', $request->min_price);
        })->when(isset($request->max_price), function($query) use ($request) {
            $query->where('price', '<=', $request->max_price);
        })->when(!isset($request->sort), function($query) {
            $query->orderBy('created_at', 'desc');
        })->when($request->sort == 'price_asc', function($query) {
            $query->orderBy('price', 'asc');
        })->when($request->sort == 'price_desc', function($query) {
            $query->orderBy('price', 'desc');
        })->paginate(20);

        $data = [
            'products' => $products
        ];

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
