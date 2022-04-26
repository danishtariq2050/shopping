<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.admin');
    }

    public function manageproduct(){
        return view('admin.product.master');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::min('price');
        dump($product);
        // $products = Product::all();
        // $products = Product::whereNull('discountprice')->get();
        $products = Product::orderBy('description', 'desc')->get();
        $allProductsCount = Product::count();
        $allNormalProductsCount = Product::whereNull('discountprice')->count();
        $allDiscountProductsCount = Product::whereNotNull('discountprice')->count();
        $productsAbc = Product::where('discountprice', '>', '6')->get();
        return view('admin.product.index', compact('products', 'productsAbc', 'allProductsCount', 'allNormalProductsCount', 'allDiscountProductsCount'));
        // return view('admin.product.index', ['products' => $products, 'users' => $products]);
    }

    public function indexdiscount()
    {
        // $products = Product::whereNotNull('discountprice')->get();
        $products = Product::findOrFail(4);
        dump($products);
        // return view('admin.discount.index', compact('products'));
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
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->discountprice = $request->name;
        // $product->discountpercentage = $request->name;
        $product->image = 'image';
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // keys in db: primary, unique, foreign
        // these keys will place on table columns
        // primary: uniqueness means no repetition and not null and place on only one column in a table
        // unique: uniqueness means no repetition and max one null and place on multiple columns in a table
        // foreign: relationship between 2 tables... table 2 foreign key column attached with table 1 primary key
            // data flow in foreign: one to one, one to many, many to one, many to many


        // all products
        // Product::all();

        // where
        // Product::where('id', 1)->last();

        // find
        // Product::find(1);
        return view('admin.product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
