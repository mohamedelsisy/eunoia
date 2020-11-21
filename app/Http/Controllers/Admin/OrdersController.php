<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        $orders = Order::with( array('user:id,name as buyer_user','product'=>function($q){
            $q->with('user:id,name as seller_user')->select('id', 'title', 'user_id', 'price', 'photo');
        }))->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function destroy($id)
    {
        // delete
        try {
            $order = Order::find($id);
            if (!$order) {
                return redirect()->route('admin.orders', $id)->with(['error' => 'هذا الطلب غير موجود']);
            }

            $order->delete();

            return redirect()->route('admin.orders')->with(['success' => 'تم حذف الطلب بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.orders')->with(['error' => 'هناك خطأ ما ']);

        }
    }

}
