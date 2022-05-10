<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
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
