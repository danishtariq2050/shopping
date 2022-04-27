<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(){
        return view('admin.admin');
    }

    public function manageproduct(){
        return view('admin.product.master');
    }

    public function index()
    {
        $allProductsCount = Product::count();
        $allNormalProductsCount = Product::whereNull('discountprice')->count();
        $allDiscountProductsCount = Product::whereNotNull('discountprice')->count();

        $products = Product::all();
        return view('admin.product.index', compact('products', 'allProductsCount', 'allNormalProductsCount', 'allDiscountProductsCount'));
    }

    public function indexdiscount()
    {

        $products = Product::whereNotNull('discountprice')->get();
        return view('admin.discount.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

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

    public function show(Product $product)
    {
        return view('admin.product.show');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit');
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}


// $product = Product::min('price');
        // dump($product);
        // $products = Product::whereNull('discountprice')->get();
        // $products = Product::orderBy('description', 'desc')->get();
        // $productsAbc = Product::where('discountprice', '>', '6')->get();
        // return view('admin.product.index', ['products' => $products, 'users' => $products]);

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


        // $products = Product::findOrFail(4);
        // dump($products);
