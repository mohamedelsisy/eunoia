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
                                <li class="breadcrumb-item"><a href="{{route('admin.comments')}}"> التعليقات </a>
                                </li>
                                <li class="breadcrumb-item active">تعديل بيانات تعليق
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل   </h4>
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
                                        <form class="form" action="{{route('admin.comments.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $comment->id }}">
                                            <input type="hidden" name="product_id" value="{{ $comment->product->id }}">
                                            <input type="hidden" name="user_id" value="{{ $comment->user->id }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات التعليق </h4>


                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">  حالة التعليق  </label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="">اختر  حالة التعليق</option>
                                                                <option {{ $comment->status === 0 ? 'selected' : ''  }}  value="0">نشط</option>
                                                                <option {{ $comment->status === 1 ? 'selected' : ''  }}   value="1">محظور</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="text-danger">
                                                                    {{$message}}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description"> محتوي التعليق   </label>
                                                            <textarea name="description" id="description" class="form-control" placeholder="أدخل وصف المنتج">{{ $comment->content }}</textarea>
                                                            @error('description')
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
                                                    <i class="la la-check-square-o"></i> حفظ
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
