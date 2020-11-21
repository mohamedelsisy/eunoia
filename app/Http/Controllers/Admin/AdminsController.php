<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {

        $admins = Admin::select()->get();
        return view('admin.admins.index', compact('admins'));
    }
    public function create()
    {
        return view('admin.admins.create');

    }


    public function store(AdminRequest $request)
    {
        try {
            $filepath = "";
            if ($request->has('photo')) {
                $filepath = uploadImage('admins', $request->photo);
            }

            Admin::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'photo'     => $filepath
            ]);
            return redirect()->route('admin.admins')->with(['success' => 'تم إضافة المسؤول بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.admins')->with(['error' => 'بوجد خطأ ما']);

        }
    }

    public function edit($id)
    {
        //
        try {
            $admin = Admin::find($id);
            if (!$admin) {
                return redirect()->route('admin.admins')->with(['error' => 'هذا المسؤول غير موجود   ']);
            }


            return view('admin.admins.edit', compact('admin'));

        } catch (Exception $exception) {

            return redirect()->route('admin.admins')->with(['error' => 'هناك خطأ ما']);

        }

    }


    public function update(AdminRequest $request)
    {
        try {

            $admin = Admin::find($request->id);
            if (!$admin) {
                return redirect()->route('admin.admins')->with(['error' => 'هذا المسؤول غير موجود']);
            }

            $filepath = "";
            if ($request->has('photo')) {
                $filepath = uploadImage('admins', $request->photo);
            }else{
                $filepath = $request->oldphoto;

            }


            $pass = "";
            if ($request->has('password')) {
                $pass = bcrypt($request->password);
            }else{
                $pass = $request->oldpasswrod;

            }


            Admin::where('id', $request->id)->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => $pass,
                'photo'     => $filepath,
            ]);
            return redirect()->route('admin.admins')->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (Exception $exception) {
            return redirect()->route('admin.admins')->with(['error' => 'يوجد خطأ ما ']);

        }
    }


    public function destroy($id)
    {
        // delete
        try {
            $admin = Admin::find($id);
            if (!$admin) {
                return redirect()->route('admin.admins', $id)->with(['error' => 'هذا المسؤول غير موجود']);
            }

            $admin->delete();

            return redirect()->route('admin.admins')->with(['success' => 'تم حذف المسؤول بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.admins')->with(['error' => 'هناك خطأ ما ']);

        }
    }
}
