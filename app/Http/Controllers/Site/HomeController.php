<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){


        $users = User::whereHas('products')->orderBy('id', 'DESC')->get();

        $products = Product::with('category')->orderByDesc('id')->get();
        return view('site.home', compact('products', 'users'));
    }
}
