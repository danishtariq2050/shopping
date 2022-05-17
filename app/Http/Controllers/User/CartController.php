<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Category;

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
}
