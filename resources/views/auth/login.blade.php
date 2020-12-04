@extends('layouts.login')
@section('title', 'تسجيل دخول')
@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">الرئيسية</a></li>
            <li>تسجيل الدخول</li>
        </ul>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Login Area -->
<section class="login-area ptb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="login-content">
                    <div class="section-title">
                        <h2><span class="dot"></span> تسجيل الدخول</h2>
                    </div>

                    <form  method="POST" action="{{ route('login') }} "class="login-form">
                        @csrf
                        <div class="form-group">
                            <label>البريد الإلكتروني</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="ادخل البريد الإلكتروني" id="email" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>الرقم السري</label>
                            <input type="password" class="form-control   @error('password') is-invalid @enderror" placeholder="ادخل الرقم السري" id="password" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>

                        @if (Route::has('password.request'))
                            <a class="forgot-password" href="{{ route('password.request') }}">
                                هل نسيت الرقم السري ؟
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="new-customer-content">
                    <div class="section-title">
                        <h2><span class="dot"></span> عميل جديد</h2>
                    </div>

                    <span>
                        قم بإنشاء حساب

                    </span>
                    <p>
                        قم بالتسجيل للحصول على حساب مجاني في متجرنا. تسجيل سريع وسهل. يتيح لك إمكانية الطلب من متجرنا. لبدء التسوق انقر فوق التسجيل.

                    </p>
                    <a href="{{ route('register') }}" class="btn btn-light">إنشاء حساب</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

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
@endsection
