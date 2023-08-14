@extends('admin.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('assets/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/img/brand/favicon4.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">
                                            {{ trans('Dashboard/login_trans.brand1') }}<span
                                                style="color: blue ; padding:5px">{{ trans('Dashboard/login_trans.brand2') }}</span>{{ trans('Dashboard/login_trans.brand3') }}
                                        </h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('Dashboard/login_trans.as_admin') }}</h2>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('admin.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ trans('Dashboard/login_trans.email') }}</label> <input
                                                        class="form-control"
                                                        placeholder="{{ trans('Dashboard/login_trans.email_hint') }}"
                                                        id="email" type="email" name="email" :value="old('email')"
                                                        required autofocus autocomplete="username">
                                                    @error('email')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ trans('Dashboard/login_trans.password') }}</label> <input
                                                        class="form-control"
                                                        placeholder="{{ trans('Dashboard/login_trans.password_hint') }}"
                                                        id="password" name="password" type="password" required
                                                        autocomplete="current-password">
                                                    @error('password')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-main-primary btn-block"
                                                    type="submit">{{ trans('Dashboard/login_trans.sign_in') }}</button>

                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">{{ trans('Dashboard/login_trans.forget_password') }}</a></p>
                                                <p>{{ trans('Dashboard/login_trans.create_an_account') }} <a
                                                        href="{{ url('/' . ($page = 'register')) }}">{{ trans('Dashboard/login_trans.dont_have_an_account') }}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
