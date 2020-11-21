<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::with(['user:id,name','category:id,name'])->select('id', 'title', 'price', 'photo', 'user_id', 'status', 'category_id')->orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        //
        try {
            $product = Product::with(['user:id,name','category:id,name'])->find($id);
            if (!$product) {
                return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود   ']);
            }

            $categories = Category::all();


            return view('admin.products.edit', compact('product', 'categories'));

        } catch (Exception $exception) {

            return redirect()->route('admin.products')->with(['error' => 'هناك خطأ ما']);

        }

    }


    public function update(ProductRequest $request)
    {
        try {

            $product = Product::find($request->id);
            if (!$product) {
                return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود']);
            }

            $filepath = "";
            if ($request->has('photo')) {
                $filepath = uploadImage('products', $request->photo);
            }else{
                $filepath = $request->old_photo;
            }

            Product::where('id', $request->id)->update([
                'title'         => $request->title,
                'category_id'   => $request->category_id,
                'user_id'       => $request->user_id,
                'price'         => $request->price,
                'status'        => $request->status,
                'content'       => $request->description,
                'photo'         => $filepath,
            ]);
            return redirect()->route('admin.products')->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (Exception $exception) {
            return redirect()->route('admin.products')->with(['error' => 'يوجد خطأ ما ']);

        }
    }


    public function destroy($id)
    {
        // delete
        try {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->route('admin.products', $id)->with(['error' => 'هذا المنتج غير موجود']);
            }

            $product->delete();

            return redirect()->route('admin.products')->with(['success' => 'تم حذف المنتج بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.products')->with(['error' => 'هناك خطأ ما ']);

        }
    }
}
