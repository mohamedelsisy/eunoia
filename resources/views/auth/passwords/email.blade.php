@extends('layouts.login')
@section('title', 'إعادة تعيين كلمة المرور')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                <li>إعادة تعيين كلمة المرور</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Login Area -->
    <section class="login-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="login-content">
                        <div class="section-title">
                            <h2><span class="dot"></span> إعادة تعيين كلمة المرور</h2>

                        </div>
                        @if (session('status'))
                            <div class="alert alert-success mt-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label>البريد الإلكتروني</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                إرسال رابط إعادة تعيين كلمة السر

                            </button>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Login Area -->
@endsection
