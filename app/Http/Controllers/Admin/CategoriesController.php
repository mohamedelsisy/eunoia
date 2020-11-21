<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Mockery\Exception;

class CategoriesController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request){

        try {

            Category::create([
                'name'        => $request->name,
            ]);
            return redirect()->route('admin.categories')->with(['success' => 'تم إضافة القسم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);

        }

    }

    public function edit($id){
        try {
            $category = Category::find($id)->first();
            if (!$category){
                return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);
            }
            return  view('admin.categories.edit', compact('category'));
        }catch (Exception $exception){
            return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }

    public function update(CategoryRequest  $request){
        try {
            $category = Category::find($request->id)->first();
            if (!$category){
                return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);
            }

            Category::where('id', $request->id)->update([
               'name'   => $request->name,
            ]);
            return redirect()->route('admin.categories')->with(['success' => 'تم  تحديث بيانات القسم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }

    public function destroy($id){
        try {
            $category = Category::find($id)->first();
            if (!$category){
                return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);
            }
            $category->delete();
            return redirect()->route('admin.categories')->with(['success' => 'تم  مسح  القسم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.categories')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }

}
