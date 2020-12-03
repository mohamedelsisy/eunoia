@extends('layouts.site')
@section('title', $category->name)
@section('content')




    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>
                    الأقسام
                </li>
                <li>
                    {{ $category->name }}
                </li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

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


<x-cart/>







@endsection
