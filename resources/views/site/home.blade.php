@extends('layouts.site')
@section('title', 'الصفحة الرئيسية')
@section('content')



    <!-- Start Main Banner Area -->
    <div class="main-banner item-bg1">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <span>New Inspiration 2019</span>
                        <h1>Clothing made for you!</h1>
                        <p>Trending from men and women style collection</p>

                        <a href="#" class="btn btn-primary">Shop Women's</a>
                        <a href="#" class="btn btn-light">Shop Men's</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Trending Products Area -->
    <section class="trending-products-area pb-60 mt-5">
        <div class="container">

            <div class="row">
                @isset($products)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="single-product-box">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{ asset('assets/'.$product->photo) }}" alt="image">
                                        <img src="{{ asset('assets/'.$product->photo) }}" alt="image">
                                    </a>

                                    <ul>
                                        <li><a href="#" data-tooltip="tooltip" data-placement="left" title="مشاهدة التفاصيل" ><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>

                                <div class="product-content">
                                    <h3>
                                        <a href="#">
                                            {{ $product->title }}
                                        </a>
                                    </h3>

                                    <div class="product-price">
                                        <span class="old-price">

                                        </span>
                                        <span class="new-price">${{ $product->price }}</span>
                                    </div>



                                    <form action="{{ route('site.cart.create') }}" method="post" id="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit"  id="add-to-cart"   class="btn btn-light">إضافة إلي السلة</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="success-msg" class="alert alert-success alert-dismissible fade show" style="display: none">
                        تم الإضافة بنجاح
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                    <div id="error-msg" class="alert alert-danger" style="display: none">
                        سجل الدخول أولاً
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endisset
            </div>
        </div>
    </section>
    <!-- End Trending Products Area -->


<x-cart/>







@endsection
