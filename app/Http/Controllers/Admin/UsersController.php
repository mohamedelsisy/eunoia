<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create(){

        return view('admin.users.create');
    }

    public function store(UserRequest $request){

        try {
            $filepath = "";
            if ($request->has('photo')){
                $filepath = uploadImage('users', $request->photo);
            }

            User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'status'        => $request->status,
                'photo'         => $filepath,
            ]);
            return redirect()->route('admin.users')->with(['success' => 'تم إضافة المستخدم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);

        }

    }

    public function edit($id){
        try {
            $user = User::find($id)->first();
            if (!$user){
                return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);
            }
            return  view('admin.users.edit', compact('user'));
        }catch (Exception $exception){
            return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }

    public function update(UserRequest  $request){
        try {

            $user = User::find($request->id)->first();
            if (!$user){
                return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);
            }

            $filepath = "";
            if ($request->has('photo')){
                $filepath = uploadImage('users', $request->photo);
            }else{
                $filepath = $request->old_photo;
            }
            $password = "";
            if ($request->has('password')){
                $password = bcrypt($request->password);
            }else{
                $password = $request->old_password;
            }
            User::where('id', $request->id)->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => $password,
                'status'        => $request->status,
                'photo'         => $filepath
            ]);
            return redirect()->route('admin.users')->with(['success' => 'تم  تحديث بيانات المستخدم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }

    public function destroy($id){
        try {
            $user = User::find($id)->first();
            if (!$user){
                return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);
            }
            $user->delete();
            return redirect()->route('admin.users')->with(['success' => 'تم  مسح  المستخدم بنجاح']);

        }catch (Exception $exception){
            return redirect()->route('admin.users')->with(['danger' => 'يوجد خطأ ما ']);

        }
    }
}
