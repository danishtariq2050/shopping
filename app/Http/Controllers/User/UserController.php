<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('user.index', compact('categories', 'products'));
    }

    public function shop()
    {
        return view('user.shop');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function contact()
    {
        return view('user.contact');
    }
}
