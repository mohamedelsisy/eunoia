@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">


                    <div class="col-xl-4 col-lg-6 col-12">
                        <a href="{{ route('admin.categories') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="success">{{ $categories }}</h3>
                                                <h6>الأقسام</h6>
                                            </div>
                                            <div>
                                                <i class="la la-list success font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12">
                        <a href="{{ route('admin.users') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="primary">{{ $users }}</h3>
                                                <h6>المستخدمين</h6>
                                            </div>
                                            <div>
                                                <i class="la la-users primary font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12">
                        <a href="{{ route('admin.products') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="dark">{{ $products }}</h3>
                                                <h6>الرسمات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-picture-o dark font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-dark" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12">
                        <a href="{{ route('admin.comments') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="warning">{{ $comments }}</h3>
                                                <h6>التعليقات</h6>
                                            </div>
                                            <div>
                                                <i class="la la-comment warning font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>





                    <div class="col-xl-4 col-lg-6 col-12">
                        <a href="{{ route('admin.contacts') }}">
                            <div class="card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="media-body text-left">
                                                <h3 class="danger">{{ $contacts }}</h3>
                                                <h6>تذاكر الرسائل</h6>
                                            </div>
                                            <div>
                                                <i class="la la-envelope-square danger font-large-2 float-right"></i>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
