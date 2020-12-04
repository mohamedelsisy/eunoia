@extends('layouts.site')
@section('title', 'الصفحة الرئيسية')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li>إتصل بنا</li>
            </ul>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-60">
        <div class="container">
            <div class="section-title">
                <h2><span class="dot"></span>إتصل بنا</h2>
            </div>

            <div class="row">


                <div class="col-lg-7 col-md-12">
                    <div class="contact-form">
                        <h3>تواصل معنا</h3>
                        <p>
                            يسعدنا الرد على أي أسئلة لديك أو تزويدك بتقدير. فقط أرسل لنا رسالة في النموذج أدناه مع أي أسئلة قد تكون لديك.

                        </p>

                        <form action="{{ route('send') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>الإسم <span>*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"   placeholder="أدخل إسمك">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>البريد الإلكتروني <span>*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"  placeholder="أدخل البريد الإلكتروني">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>رقم الهاتف <span>*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control"  placeholder="ادخل عنوان مناسب للرسالة">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>عنوان الرسالة<span>*</span></label>
                                        <input type="text" name="subject" id="subject" class="form-control"  placeholder="ادخل عنوان مناسب للرسالة">
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>رسالتك <span>*</span></label>
                                        <textarea name="message" id="message" cols="30" rows="8" class="form-control" placeholder="إكتب رسالتك ...."></textarea>
                                        @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">إرسال</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ">
                    <img src="{{ asset('assets/site/img/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

    <x-cart/>







@endsection
