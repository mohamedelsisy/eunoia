@extends('layouts.site')
@section('title', 'من نحن ')
@section('content')


    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>من نحن</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <h2>من نحن</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>


                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{ asset('assets/site/img/logo.png') }}" class="about-img1" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->


    <!-- Start Facility Area -->
    <section class="facility-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h3>
                            شحن مجاني لجميع أنحاء العالم

                        </h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <h3>
                            ضمان استرداد الأموال بنسبة 100٪

                        </h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <h3>
                            العديد من بوابات الدفع

                        </h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="facility-box">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>24/7 الدعم عبر الإنترنت</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Facility Area -->

<x-cart/>







@endsection
