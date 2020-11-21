<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Cart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    Public $carts = "";
    Public $report = "";
    Public $price = "";
    public function __construct()
    {
        $carts = \App\Models\Cart::with('product:id,title,price,photo')->where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($carts as $cart){
            $total = $total + $cart->product->price * $cart->quantity;
        }

        return [
            $this->report = $carts,
            $this->price = $total,
        ];



    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
