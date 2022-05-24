<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Category;
use App\Checkout;

class CartController extends Controller
{
    public function cart()
    {
        if(!Session::has('cart')){
            return redirect()->route('user.shop');
        }

        $cart = $this->isCart();
        $quantity = $cart->totalQty;
        $price = $cart->totalPrice;
        $items = $cart->items;
        $categories = Category::all();

        return view('user.cart', compact('categories', 'quantity', 'price', 'items'));
    }

    public function addToCart($id){
        $product = Product::find($id);
        $cart = $this->isCart();
        $cart->add($product, $product->id);
        Session::put('cart', $cart);
        return back();
    }

    public function removeFromCart($id){
        $product = Product::find($id);
        $cart = $this->isCart();
        $cart->remove($product, $product->id);
        Session::put('cart', $cart);
        return back();
    }

    public function deleteFromCart($id){
        $product = Product::find($id);
        $cart = $this->isCart();
        $cart->delete($product->id);
        Session::put('cart', $cart);
        return back();
    }

    public function clearCart(){
        $cart = $this->isCart();
        $cart->deleteAll();
        Session::forget('cart');
        return back();
    }

    public function isCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        return new Cart($oldCart);
    }

    public function checkout(){
        if(!Session::has('cart')){
            return redirect()->route('user.shop');
        }

        $cart = $this->isCart();
        $quantity = $cart->totalQty;
        $price = $cart->totalPrice;
        $items = $cart->items;
        $categories = Category::all();

        return view('user.checkout', compact('categories', 'quantity', 'price', 'items'));
    }

    public function saveCheckout(Request $request){
        $checkout = new Checkout;
        $checkout->fname = $request->fname;
        $checkout->lname = $request->lname;
        $checkout->address = $request->address;
        $checkout->country = $request->country;
        $checkout->phone = $request->phone;
        $checkout->email = $request->email;
        Session::put('checkout', $checkout);
    }
}
