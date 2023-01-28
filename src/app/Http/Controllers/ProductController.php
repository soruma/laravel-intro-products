<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
        $product = new Product();
        $categoris = Category::all();
        $data = [
            'product' => $product,
            'categoris' => $categoris,
        ];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ProductController::validate_params());

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categoris = Category::all();
        $data = [
            'product' => $product,
            'categoris' => $categoris,
        ];

        return view('products.edit', $data);
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
        $this->validate($request, ProductController::validate_params());

        $product->category_id = $request->category_id;
        $product->maker = $request->maker;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }

    private static function validate_params() {
        return [
            'category_id' => 'required|exists:categories,id',
            'maker' => 'required|max:255',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ];
    }
}
