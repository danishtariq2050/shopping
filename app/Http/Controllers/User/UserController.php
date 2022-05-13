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

        $date = \Carbon\Carbon::now()->subDays(3);
        $latestProducts = Product::where("created_at", '>=', $date)->orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('categories', 'products', 'latestProducts'));
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
