<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ProfilesController extends Controller
{
    public  function  index(){
        try{
            $admin = Admin::find(Auth::id());
            if (!$admin){
                return redirect()->route('admin.login');
            }
            return view('admin.profiles.index', compact('admin'));
        }catch (Exception $exception){
            return redirect()->route('admin.login');

        }

    }
    public  function  edit($id){
        try{
            $admin = Admin::find($id);
            if (!$admin){
                return redirect()->route('admin.login');
            }
            if ($admin->id != Auth::id()){
                return redirect()->route('admin.login');
            }

            return view('admin.profiles.edit', compact('admin'));
        }catch (Exception $exception){
            return redirect()->route('admin.login');

        }
    }
    public function update(ProfileRequest $request){
        try{

            $admin = Admin::find($request->id);
            if (!$admin){
                return redirect()->route('admin.login');
            }
            $filepath = "";
            if ($request->has('photo')){
                $filepath = uploadImage('admins', $request->photo);
            }else{
                $filepath = $request->old_photo;
            }

            if ($request->has('password')){
                $password = bcrypt($request->password);
            }else{
                $password = $request->old_password;
            }

            Admin::where('id', $request->id)->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => $password,
                'photo'             => $filepath,
            ]);
            return redirect()->route('admin.profiles')->with(['success' => 'تم تحديث البانات بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.profiles')->with(['error' => 'يوجد خطأ ما ']);

        }
    }
}
