@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    التعليقات
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">كل التعليقات</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">

                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>عنوان المنتج </th>
                                                        <th>إسم المستخدم</th>
                                                        <th>التعليق</th>
                                                        <th>الحالة</th>
                                                        <th>الإجراءات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($comments)
                                                        @foreach($comments as $comment)
                                                            <tr>
                                                                <td>{{ $comment->product->title }}</td>
                                                                <td>{{ $comment->user->name }}</td>
                                                                <td>{{ $comment->content }}</td>

                                                                <td>
                                                                    @if($comment->status === 0)
                                                                        <span class="success">نشط</span>
                                                                    @else
                                                                        <span class="danger">محظور</span>

                                                                    @endif
                                                                </td>




                                                                <td>
                                                                    <a href="{{route('admin.comments.edit', $comment->id)}}" class="btn btn-success btn-min-width box-shadow-1 mr-1 mb-1">
                                                                        <i class="la la-edit"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.comments.destroy', $comment->id)}}" class="btn btn-danger btn-min-width box-shadow-5 mr-1 mb-1">
                                                                        <i class="la la-close"></i>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>
@endsection
