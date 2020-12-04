@extends('layouts.site')
@section('title', 'سلة المشتريات')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>قائمة الإعجابات </li>
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
                                    <th scope="col">صورة الرسمة</th>
                                    <th scope="col">إسم الرسمة</th>
                                    <th scope="col">الإجراءات</th>
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




                                                <td class="product-subtotal">
                                                    <a href="{{ route('site.products.show', $cart->product->id) }}" class="success"><i class="far fa-eye"></i></a>
                                                    <a href="{{ route('site.cart.destroy', $cart->id) }}" class="remove"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset



                                </tbody>
                            </table>
                        </div>





                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->
@endsection
@section('scripts')
@endsection
