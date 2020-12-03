@extends('layouts.site')
@section('title', 'الصفحة الرئيسية')
@section('content')





    <!-- Start Trending Products Area -->
    <section class="trending-products-area pb-60 mt-5">
        <div class="container">

            <div class="row">
                @isset($products)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="single-product-box">
                                <div class="product-image">
                                    <a href="{{ route('site.products.show',$product->id) }}">
                                        <img src="{{ asset('assets/'.$product->photo) }}" alt="image">
                                        <img src="{{ asset('assets/'.$product->photo) }}" alt="image">
                                    </a>

                                    <ul>
                                        <li><a href="{{ route('site.products.show',$product->id) }}" data-tooltip="tooltip" data-placement="left" title="{{ $product->title }}" ><i class="far fa-eye"></i></a></li>
                                        <li>
                                            <form action="{{ route('site.cart.create') }}" method="post" id="add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                    <button class="btn btn-dark" type="submit"   data-tooltip="tooltip" data-placement="left" title="إضافة لقائمة الإعجابات"  id="add-to-cart"   class="btn btn-light">
                                                            <i class="fa fa-plus"></i>
                                                    </button>

                                            </form>
                                        </li>
                                    </ul>
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


    @isset($users)
        <!-- Start News Area -->
        <section class="news-area ptb-60">
            <div class="container">
                <div class="section-title">
                    <h2>
                        <span class="dot"></span>
                        الرسامين الأكثر تميز بالشهر

                    </h2>
                </div>

                <div class="row">
                    <div class="news-slides owl-carousel owl-theme">

                        @foreach($users as $user)

                            <div class="col-lg-12 col-md-12">
                                <div class="single-news-post">
                                    <div class="news-image">
                                        <a href="{{ route('site.profiles.show', $user->id) }}">
                                            <img src="{{ asset('assets/'. $user->photo) }}" alt="image">
                                        </a>
                                    </div>

                                    <div class="news-content">
                                        <h3>
                                            <a href="{{ route('site.profiles.show', $user->id) }}">
                                                {{ $user->name }}
                                            </a>
                                        </h3>
                                        <span class="author"><a href="#">عدد الرسومات</a> : {{ $user->products->count()  }}</span>
                                        <p>
                                            {{ $user->about }}
                                        </p>
                                        <a href="{{ route('site.profiles.show', $user->id) }}" class="btn btn-light">عرض صفحة الرسام</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- End News Area -->
    @endisset


<x-cart/>







@endsection
