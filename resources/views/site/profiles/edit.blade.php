@extends('layouts.site')

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

    <!-- Start Contact Area -->
    <section class="contact-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2>
                    <span class="dot"></span>
                    تعديل بيانات العضو
                </h2>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">

                        <form method="post"  action="{{ route('site.profiles.update') }} " enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="hidden" name="old_photo" value="{{ $user->photo }}">
                            <input type="hidden" name="old_password" value="{{ $user->password }}">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label> الإسم </label>
                                        <input type="text" name="name" id="name" class="form-control" required value="{{ $user->name }}"  placeholder="ادخل الإسم">
                                        @error('name')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label> البريد الإلكتروني </label>
                                        <input type="email" name="email" id="email" class="form-control" required value="{{ $user->email }}"  placeholder="ادخل البريد الإلكتروني">
                                        @error('email')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>الصورة الشخصية </label>
                                        <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="form-control"  >
                                        @error('photo')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>  الرقم السري </label>
                                        <input type="password" name="password" id="password" class="form-control" required   placeholder="ادخل  الرقم السري">
                                        @error('password')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>السيرة الذاتية </label>
                                        <textarea name="about" id="about" cols="30" rows="8"  class="form-control" placeholder="ادخل السيرة الذاتية ">{{ $user->about }}</textarea>
                                        @error('about')
                                        <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        تحديث
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->
@endsection
