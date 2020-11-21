<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $admins             = Admin::count();
        $categories         = Category::count();
        $products           = Product::count();
        $comments           = Comment::count();
        $orders             = Order::count();
        $users              = User::count();
        $contacts           = Contact::count();

        $last_orders        = Order::orderBy('id', 'DESC')->limit(5)->get();
        $last_contacts      = Contact::orderBy('id', 'DESC')->limit(5)->get();

        return view('admin.dashboard', compact('admins', 'categories', 'products', 'comments', 'orders', 'users', 'orders' , 'contacts', 'last_orders', 'last_contacts'));
    }
}
