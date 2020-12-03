@extends('layouts.site')
@section('title', 'إضافة رسمة جديد')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <ul>
                <li><a href="{{ route('site.home') }}">الرئيسية</a></li>
                <li>إضافة رسمة جديد</li>
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
                    إضافة رسمة جديد
                </h2>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">

                        <form method="post"  action="{{ route('site.products.store') }} " enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>عنوان الرسمة </label>
                                        <input type="text" name="title" id="title" class="form-control" required  placeholder="أدخل عنوان الرسمة">

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>قسم الرسمة</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">إختر قسم الرسمة</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>سعر الرسمة </label>
                                        <input type="text" name="price" id="price" class="form-control"   placeholder="أدخل سعر الرسمة">

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>صورة الرسمة</label>
                                        <input type="file" name="photo" id="photo" class="form-control" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>وصف الرسمة</label>
                                        <textarea name="description" id="description" cols="30" rows="8"  class="form-control" placeholder="ادخل وصف الرسمة"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        إضافة
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
