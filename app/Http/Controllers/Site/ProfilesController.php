<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ProfilesController extends Controller
{
    public  function  show($id){
        try{
            $user = User::find($id);
            if (!$user){
                alert()->error('خطأ ','  هذا العضو غير موجود');
                return redirect()->route('home');
            }
            return view('site.profiles.index', compact('user'));
        }catch (Exception $exception){
            alert()->error('خطأ ','  يوجد خطأ ما   ');
            return redirect()->route('home');

        }

    }
    public  function  edit($id){
        try{
            $user = User::find($id);
            if (!$user){
                return redirect()->route('login');
            }
            if ($user->id != auth::id()){
                return redirect()->route('login');
            }

            return view('site.profiles.edit', compact('user'));
        }catch (Exception $exception){
            return redirect()->route('login');

        }
    }
    public function update(ProfileRequest $request){
        try{

            $user = User::find($request->id);
            if (!$user){
                return redirect()->route('login');
            }
            $filepath = "";
            if ($request->has('photo')){
                $filepath = uploadImage('users', $request->photo);
            }else{
                $filepath = $request->old_photo;
            }

            if ($request->has('password')){
                $password = bcrypt($request->password);
            }else{
                $password = $request->old_password;
            }

            User::where('id', $request->id)->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => $password,
                'photo'             => $filepath,
                'about'             => $request->about
            ]);

            alert()->success('success ','  تم تحديث البيانات بنجاح   ');

            return redirect()->route('site.profiles.show', auth()->id());

        }catch (Exception $exception){
            alert()->error('error ','  يوجد خطأ ما   ');
            return redirect()->route('site.profiles');

        }
    }
}
