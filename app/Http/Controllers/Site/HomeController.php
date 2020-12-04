<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class HomeController extends Controller
{
    public function index(){


        $users = User::whereHas('products')->orderBy('id', 'DESC')->get();

        $products = Product::with('category')->orderByDesc('id')->get();
        return view('site.home', compact('products', 'users'));
    }

    public function about(){

        return view('site.about');
    }

    public function contact(){

        return view('site.contact');
    }

    public function send(ContactRequest $request){

        try {

            Contact::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'subject'       => $request->subject,
                'message'       => $request->message,
            ]);

            alert()->success('تم بنجاح','تم إرسال الرسالة بنجاح سيتم الرد قريباً  ');
            return redirect()->back();
        }catch (Exception $exception){

            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('home');
        }
    }
}
