@extends('layouts.site')
@section('title', 'سلة المشتريات')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>سلة المشتريات</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Cart Area -->
    <section class="cart-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form>
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">صورة المنتج</th>
                                    <th scope="col">إسم المنتج</th>
                                    <th scope="col">سعر الوحدة</th>
                                    <th scope="col">الكمية</th>
                                    <th scope="col">السعر الكلي</th>
                                </tr>
                                </thead>

                                <tbody>

                                    @isset($carts)
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/'.$cart->product->photo) }}" alt="item">
                                                    </a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="#">{{ $cart->product->title }}</a>

                                                </td>

                                                <td class="product-price">
                                                    <span class="unit-amount">${{ $cart->product->price }}</span>
                                                </td>

                                                <td class="product-quantity">
                                                    <span class="unit-amount">{{ $cart->quantity }}</span>

                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="subtotal-amount">${{ $cart->product->price * $cart->quantity }}</span>

                                                    <a href="{{ route('site.cart.destroy', $cart->id) }}" class="remove"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset



                                </tbody>
                            </table>
                        </div>



                        @if($total > 0)

                            <div class="cart-totals">
                                <h3>
                                    إجمالي سلة التسوق
                                </h3>

                                <ul>
                                    <li>السعر الكي <span>${{ $total }}</span></li>
                                    <li>Shipping <span>$20</span></li>
                                    <li>Total <span><b>${{ $total - 20 }}</b></span></li>
                                </ul>
                                <a href="#" class="btn btn-light">إتمام الشراء</a>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
@section('scripts')
@endsection
