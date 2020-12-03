<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CategoriesController extends Controller
{
    //

    public function show($id){
        try {
            $category = Category::find($id);
            if (!$category){
                alert()->error('خطأ ','  هذا القسم غير موجود');
                return redirect()->back();
            }
            $products = Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
            return view('site.categories.show', compact('products', 'category'));

        }catch (Exception $exception){
            alert()->error('خطأ ','يوجد خطأ ما');

            return redirect()->route('site.home');
        }
    }
}
