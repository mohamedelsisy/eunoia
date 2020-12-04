@extends('layouts.login')
@section('title', 'إنشاء حساب')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>إنشاء حساب</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start SignUP Area -->
    <section class="signup-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="signup-content">
                        <div class="section-title">
                            <h2><span class="dot"></span> إنشاء حساب</h2>
                        </div>

                        <form  method="POST" action="{{ route('register') }} " class="signup-form">
                            @csrf
                            <div class="form-group">
                                <label>الإسم</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="ادخل الإسم بالكامل" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="ادخل البريد الإلكتروني" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="ادخل الرقم السري" id="password" name="password" autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>تأكيد الرقم السري</label>
                                <input type="password" class="form-control" placeholder="تأكيد الرقم السري" id="password_confirmation" name="password_confirmation" autocomplete="new-password">

                            </div>

                            <button type="submit" class="btn btn-primary">إنشاء الحساب</button>

                            <a href="{{ route('home') }}" class="return-store">أو الرجوع للرئيسية</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="new-customer-content">
                        <div class="section-title">
                            <h2><span class="dot"></span> مسجل بالفعل </h2>
                        </div>

                        <span>
                        قم بتسجيل الدخول

                    </span>
                        <p>
                            قم بتسجيل الدخول  في متجرنا. تسجيل سريع وسهل. يتيح لك إمكانية الطلب من متجرنا. لبدء التسوق انقر فوق تسجل الدخول.

                        </p>
                        <a href="{{ route('login') }}" class="btn btn-light">تسجيل الدخول </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End SignUP Area -->

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
