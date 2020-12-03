<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use RealRashid\SweetAlert\Facades\Alert;



class CartController extends Controller
{


    public function index(){
        $carts = Cart::with('product')->where('user_id', auth()->id())->get();

        $total = 0;
        foreach ($carts as $cart){
            $total = $total +  $cart->product->price * $cart->quantity;
        }

        return  view('site.cart.index', compact('carts', 'total'));
    }

    public function addToCart(Request  $request){

        try{
            $check = Cart::where('product_id' , $request->product_id)->where('user_id', $request->user_id)->first();

            if ($check){
                Cart::where('id', $check->id)->update([
                    'quantity'   => $check->quantity + 1,
                ]);
                alert()->success('تم بنجاح','تم الإضافة للإعجابات بنجاح');
                return redirect()->back();
            }else{

                Cart::create([
                    'user_id'                   => $request->user_id,
                    'product_id'                 => $request->product_id,

                ]);
                alert()->success('تم بنجاح','تم الإضافة للإعجابات بنجاح');
                return redirect()->back();
            }

        }catch (Exception $e){
            return abort('404');

        }
    }

    public function destroy($id){
        try {
            $cart = Cart::find($id);
            if (!$cart){
                return abort(404);
            }
            $cart->delete();
            return  redirect()->back();
        }catch (Exception $exception){
            return abort(404);

        }
    }
    public function deleteAll(){
        try {
            $carts = Cart::with('product')->where('user_id', auth()->id())->get();
            if (!$carts){
                return abort(404);
            }
            foreach ($carts as $cart){
                $cart->delete();
            }
            return redirect()->back();
        }catch (Exception $exception){
            return abort(404);

        }
    }
}
