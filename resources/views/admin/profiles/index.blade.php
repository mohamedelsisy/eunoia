@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body"><div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-with-cover">
                            <div class="card-img-top img-fluid bg-cover height-300 user-profile-cover-image"></div>
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
                                        <img src="{{ asset('assets/'. $admin->photo) }}" class="rounded-circle img-border height-100" alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">{{ $admin->name }}</h3>
                                        </div>
                                        <div class="col text-right">
                                            <a href="{{ route('admin.profiles.edit', $admin->id) }}" class="btn btn-success">
                                                <i class="la la-cog"></i>
                                                تعديل البيانات
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.includes.alerts.success')
                    @include('admin.includes.alerts.errors')
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END: Content-->
@endsection
