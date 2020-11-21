@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.admins')}}"> المسؤل </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل البيانات
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">  تعديل البيانات </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.profiles.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $admin->id }}">
                                            <input type="hidden" name="old_photo" value="{{ $admin->photo }}">
                                            <input type="hidden" name="old_password" value="{{ $admin->password }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات المسؤول </h4>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> اسم  المسؤول </label>
                                                            <input type="text"  id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل اسم المسؤول   "
                                                                   value="{{ $admin->name }}"
                                                                   name="name">
                                                            @error('name')
                                                            <span class="text-danger">
                                                                    {{$message}}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> البريد الإلكتروني    </label>
                                                            <input type="email"  id="name"
                                                                   class="form-control"
                                                                   placeholder="ادخل   البريد الإلكتروني  "
                                                                   value="{{ $admin->email }}"
                                                                   name="email">
                                                            @error('email')
                                                            <span class="text-danger">
                                                                    {{$message}}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">  الرقم السري    </label>
                                                            <input type="password"  id="password"
                                                                   class="form-control"
                                                                   placeholder='أدخل الرقم السري'

                                                                   name="password">
                                                            @error('password')
                                                            <span class="text-danger">
                                                                    {{$message}}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="photo">صورة المسؤول</label>
                                                            <input type="file"  id="photo"
                                                                   class="form-control"
                                                                   placeholder="ادخل   البريد الإلكتروني  "

                                                                   name="photo">
                                                            @error('photo')
                                                            <span class="text-danger">
                                                                    {{$message}}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>




                                                </div>

                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
