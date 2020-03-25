@extends('layouts.loginMain')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{--                        <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>--}}
                            <div class="col-lg-6" style="margin: auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ورود به پنل مدیریت</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="ایمیل..." value="{{ old('email') }}" autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                   id="exampleInputPassword" placeholder="رمز عبور...">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">مرا به خاطر
                                                    بسپار</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            ورود
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
