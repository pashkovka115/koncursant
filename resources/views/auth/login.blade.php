@extends('admin.layouts.app_without_nav')
@section('title') Вход @endsection
@section('header')
<style>
    body{
        margin-bottom: 0 !important;
    }
    .main-content{
        margin-left: 0;
    }
    .page-content{
        padding: 0;
    }
</style>
@endsection

@section('content')
{{--<div class="home-btn d-none d-sm-block">
    <a href="{{url('index')}}"><i class="mdi mdi-home-variant h2 text-white"></i></a>
</div>--}}
<div>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <div>
                                    {{--<div class="text-center">
                                        <div>
                                            <a href="{{url('index')}}" class="logo">EKOID</a>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                        <p class="text-muted">Sign in to continue to Nazox.</p>
                                    </div>--}}

                                    <div class="">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                <label for="email">E-Mail</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Введите Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="password">Пароль</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Введите пароль">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            {{--<div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>--}}

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Войти</button>
                                            </div>

                                            {{--<div class="mt-4 text-center">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> {{ __('Forgot your password?') }}</a>
                                                @endif
                                            </div>--}}
                                        </form>
                                    </div>

                                    {{--<div class="mt-5 text-center">
                                        <p>Don't have an account ? <a href="{{url('register')}}" class="font-weight-medium text-primary"> Register </a> </p>
                                        <p><script>document.write(new Date().getFullYear())</script>© Nazox.  Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-lg-8">
                <div class="authentication-bg">
                <div class="bg-overlay"></div>
            </div>--}}
        </div>
    </div>
</div>
</div>
@endsection
