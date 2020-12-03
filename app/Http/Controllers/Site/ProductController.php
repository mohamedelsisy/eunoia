<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductController extends Controller
{
    public function index(){

    }

    public function create(){
        $categories = Category::all();
        return view('site.products.create', compact('categories'));
    }

    public function store(ProductRequest $request){


        try {

            $filepath = "";
            if ($request->has('photo')) {
                $filepath = uploadImage('products', $request->photo);
            }


            Product::create([
               'user_id'        => $request->user_id,
               'category_id'    => $request->category_id,
               'title'          => $request->title,
               'price'          => $request->price,
               'content'        => $request->description,
                'photo'         => $filepath

            ]);
            alert()->success('Success ','  تم إضافة الرسمة بنجاح   ');
            return redirect()->back();
        }catch (Exception $exception){
            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('site.home');
        }
    }


    public function edit($id){
        try {
            $product = Product::where('user_id', auth()->id())->where('id', $id)->first();
            if (!$product){
                alert()->error('خطأ ','  هذا الرسمة غير موجود');
                return redirect()->back();
            }
            $categories = Category::all();
            return view('site.products.edit', compact('product', 'categories'));
        }catch (Exception $exception){
            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('site.home');
        }

    }


    public function update(ProductRequest $request){
        try {

            $product = Product::where('user_id', auth()->id())->where('id', $request->id)->first();

            if (!$product){
                alert()->error('خطأ ','  هذا الرسمة غير موجود');
                return redirect()->back();
            }


            $filepath = "";
            if ($request->has('photo')) {
                $filepath = uploadImage('products', $request->photo);
            }else{
                $filepath = $request->old_photo;
            }


            Product::where('id', $request->id)->update([
                'user_id'        => $request->user_id,
                'category_id'    => $request->category_id,
                'title'          => $request->title,
                'price'          => $request->price,
                'content'        => $request->description,
                'photo'         => $filepath
            ]);
            alert()->success('Success ','  تم تحديث الرسمة بنجاح   ');
            return redirect()->back();
        }catch (Exception $exception){
            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('site.home');
        }
    }
    public function show($id){
        try {
            $product  = Product::where('id', $id)->first();

            if (!$product){
                alert()->error('خطأ ','  هذا الرسمة غير موجود');
                return redirect()->back();
            }
            $categories = Category::whereHas('products')->get();

            $lastproducts = Product::orderBy('id', 'DESC')->take(5)->get();
            return view('site.products.show', compact('product', 'lastproducts', 'categories'));
        }catch (Exception $exception){
            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('site.home');
        }
    }


    public function destroy($id){

        try {
            $product  = Product::where('id', $id)->where('user_id', auth()->id())->first();
            if (!$product){
                alert()->error('خطأ ','  هذا الرسمة غير موجود');
                return redirect()->back();
            }

            if ($product->comments){
                foreach ($product->comments as $comment){
                    $comment->delete();
                }
            }

            if ($product->carts){
                foreach ($product->carts as $cart){
                    $cart->delete();
                }
            }
            $product->delete();

            alert()->success('Success', 'تم حذف الرسمة بنجاح');
            return  redirect()->back();
        }catch (Exception $exception){
            alert()->error('خطأ ','  يوجد خطأ ما   ');
            return redirect()->route('site.home');
        }
    }


}
