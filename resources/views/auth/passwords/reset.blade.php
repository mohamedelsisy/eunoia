@extends('layouts.login')
@section('title', 'إعادة تعيين كلمة المرور')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>إنشاء حساب</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start SignUP Area -->
    <section class="signup-area ptb-60">
        <div class="container">
            <div class="signup-content">
                <div class="section-title">
                    <h2><span class="dot"></span> إعادة تعيين كلمة المرور</h2>
                </div>

                <form  method="POST" action="{{ route('password.update') }}" class="signup-form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">


                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="ادخل البريد الإلكتروني" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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

                    <button type="submit" class="btn btn-primary">إعادة تعيين </button>

                </form>
            </div>


        </div>
    </section>
    <!-- End SignUP Area -->

@endsection
