<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Cart;
use App\Wishlist;
use Session;

class UserController extends Controller
{
    // public function __construct()
    // {
        // $this->middleware('auth')->except('contact');
        // $this->middleware('auth')->only('contact');
        // $this->middleware('guest');
    // }

    public function index()
    {
        $categories = Category::all();
        $products = Product::all();

        $date = \Carbon\Carbon::now()->subDays(3);
        $latestProducts = Product::where("created_at", '>=', $date)->orderBy('created_at', 'DESC')->get();

        $cart = $this->isCart();
        $quantity = $cart->totalQty;
        $price = $cart->totalPrice;

        return view('user.index', compact('categories', 'products', 'latestProducts', 'quantity', 'price'));
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::whereNull('discountprice')->paginate(9);
        $discountedProducts = Product::whereNotNull('discountprice')->get();

        $cart = $this->isCart();
        $quantity = $cart->totalQty;
        $price = $cart->totalPrice;

        return view('user.shop', compact('categories', 'products', 'discountedProducts', 'quantity', 'price'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function isCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        return new Cart($oldCart);
    }

    public function getWishlist(){
        $categories = Category::all();
        $wishlists = Wishlist::all();

        $cart = $this->isCart();
        $quantity = $cart->totalQty;
        $price = $cart->totalPrice;

        return view('user.wishlist', compact('categories', 'quantity', 'price', 'wishlists'));
    }

    public function saveWishlist($productId){
        $w = new Wishlist;
        $w->product_id = $productId;
        $w->user_id = 1;
        $w->save();
        return back();
    }
}
