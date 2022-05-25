<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
        // $this->middleware('guest');
    // }

    public function home(){
        return view('admin.admin');
    }

    public function manageproduct(){
        return view('admin.product.master');
    }


    public function index()
    {
        $allProductsCount = Product::count();
        $allNormalProductsCount = Product::whereNull('discountprice')->whereNull('discountpercentage')->count();
        $allDiscountProductsCount = Product::whereNotNull('discountprice')->orWhereNotNull('discountpercentage')->count();

        $products = Product::all();

        // if($allProductsCount == 0){
        if($products->isEmpty()){
            session()->flash('delete', 'No Products Found! Create A New One!!!');
            return redirect()->route('products.create');
        }

        return view('admin.product.index', compact('products', 'allProductsCount', 'allNormalProductsCount', 'allDiscountProductsCount'));
    }

    public function indexdiscount()
    {
        $allProductsCount = Product::count();
        $allNormalProductsCount = Product::whereNull('discountprice')->whereNull('discountpercentage')->count();
        $allDiscountProductsCount = Product::whereNotNull('discountprice')->orWhereNotNull('discountpercentage')->count();


        $products = Product::whereNotNull('discountprice')->orWhereNotNull('discountpercentage')->get();
        if($products->isEmpty()){
            session()->flash('delete', 'No Discounted Products Found! Create A New One!!!');
            return redirect()->route('products.create');
        }
        return view('admin.discount.index', compact('products', 'allProductsCount', 'allNormalProductsCount', 'allDiscountProductsCount'));
    }

    public function create()
    {
        $product = new Product;
        $categories = Category::all();

        if($categories->isEmpty()){
            session()->flash('delete', 'No Categories Found! Create A New One!!!');
            return redirect()->route('categories.create');
        }

        return view('admin.product.create', compact('product', 'categories'));
    }
    public function managebanner(){
        echo'banner';
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->discountprice = $request->name;
        // $product->discountpercentage = $request->name;
        $product->image = 'image';
        $product->save();

        $this->saveImage($product);
        session()->flash('save', 'Product Saved!!!');
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function percentage(Product $product)
    {
        return view('admin.product.percentage', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discountprice = $request->discountprice;
        $product->discountpercentage = $request->discountpercentage;
        // $product->image = 'image';
        $product->update();

        $this->saveImage($product);

        session()->flash('update', 'Product Updated!!!');
        return redirect()->route('products.index');
    }

    public function addpercentage(Request $request, Product $product)
    {
        $product->name = $request->name;
        // $product->description = $request->description;
        // $product->discountprice = $request->discountprice;
        $product->discountpercentage = $request->discountpercentage;

        // $product->price = $request->price;
        $product->discountprice = $product->price * (1 - $product->discountpercentage / 100);


        // $product->discountprice = $request->($product->discountprice-(($product->discountpercentage / 100) * $product->discountpercentage));

        // $product->image = 'image';
        $product->update();

        session()->flash('update', 'Discount Added!!!');
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('delete', 'Product Deleted!!!');
        return redirect()->route('products.index');
    }
    public function discountproductdel(Product $product)
    {
        $product->delete();
        session()->flash('delete', 'Product Deleted!!!');
        return redirect()->route('products.');
    }

    private function saveImage($product){
        if(request()->has('image')){
            $product->update(['image' => request()->image->store('products', 'public')]);
        }
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
