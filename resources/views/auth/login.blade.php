@extends('layouts.masterLogin')

@section('title', 'Login - SLES')

@section('content')
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('login_store') }}">
                    @csrf

                    <div class="login-form-body">
                        <div class="login-form-head">
                            <h4>Sign In</h4>
                            <p>Welcome To SLES</p>
                            <hr>
                            @error('nik')
                                <div class="alert alert-danger" role="alert" style="text-align:center">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-gp">
                            <label for="InputNik">NIK</label>
                            <input id="InputNik" type="text" class="@error('nik') is-invalid @enderror" name="nik" required autocomplete="nik">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="InputPassword">Password</label>
                            <input id="InputPassword" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Login') }} <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
