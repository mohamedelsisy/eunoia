@extends('layouts.site')
@section('title', $user->name)
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>
                    {{ $user->name }}
                </li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->


    <div class="py-4">
        <div class="container">
            <div class="row">

                <aside class="col col-xl-3 order-xl-1 col-lg-12 order-lg-1 col-12">
                    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                        <div class="py-4 px-3 border-bottom">
                            <img src="{{ asset('assets/'.$user->photo) }}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-4">
                                {{ $user->name }}
                            </h5>
                        </div>
                        <div class="d-flex">
                            <div class="col-6 border-right p-3">
                                <h6 class="font-weight-bold text-dark mb-1">
                                    {{ $user->products->count() }}
                                </h6>
                                <p class="mb-0 text-black-50 small">الرسومات</p>
                            </div>
                            <div class="col-6 p-3">
                                <h6 class="font-weight-bold text-dark mb-1">{{ $user->comments->count() }}</h6>
                                <p class="mb-0 text-black-50 small">التعليقات</p>
                            </div>
                        </div>
                        <div class="overflow-hidden border-top">
                            @auth()
                                @if($user->id == auth()->id())

                                    <a href="{{ route('site.profiles.edit', auth()->id()) }}" class="btn btn-lg">
                                        <i class="fa fa-edit"></i>
                                        تعديل بياناتي
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-lg pl-2 pr-4">
                                            <i class="ft-power"></i>
                                            تسجيل الخروج
                                        </button>
                                    </form>
                                @endif
                            @endauth

                        </div>
                    </div>
                    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">

                        <div class="p-3">
                            <a href="{{ route('site.products.create') }}" class="btn btn-outline-primary pl-4 pr-4">
                                إضافة رسمة  جديدة
                            </a>
                        </div>
                    </div>
                </aside>
                <main class="col col-xl-9 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm border rounded bg-white mb-3">
                        <div class="box-title border-bottom p-3">
                            <h6 class="m-0">معلومات عني</h6>
                        </div>
                        <div class="box-body p-3">
                            <p>
                                {{ $user->about }}
                            </p>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @isset($user->products)
        <!-- Start Lookbook Area -->
        <section class="lookbook-area ptb-60">
            <div class="container">
                <div class="section-title">
                    <h2><span class="dot"></span> الرسومات</h2>
                </div>

                <div class="row">
                    @foreach($user->products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-lookbook-box">
                                <a href="{{ route('site.products.show', $product->id) }}">
                                    <img src="{{ asset('assets/'.$product->photo) }}" alt="image">

                                </a>
                                <div class="category">
                                    <span>
                                        <a href="{{ route('site.products.show', $product->id) }}">
                                            {{ $product->title }}
                                        </a>

                                    </span>
                                    @auth()
                                        @if($user->id == auth()->id())
                                            <span>
                                                <a href="{{ route('site.products.edit', $product->id) }}" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                    تعديل
                                                </a>

                                                <a href="{{ route('site.products.destroy', $product->id) }}" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                    حذف
                                                </a>
                                            </span>


                                        @endif
                                    @endauth

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Lookbook Area --
    @endisset
@endsection
