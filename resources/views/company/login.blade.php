@extends('layouts.layout')

@section('contents')
    <div class="container-fluid">
        <div class="d-flex full-height p-v-15 flex-column justify-content-between">
            <div class="d-none d-md-flex p-h-40">
                <img src="assets/images/logo/logo.png" alt="">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="m-t-20">Sign In</h2>
                                <p class="m-b-30">Enter your credential to get access</p>
                                @if (session('res'))
                                    <div class="alert alert-{{ session('res')['type'] }}">{{ session('res')['message'] }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ url('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">Email:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control" id="email" placeholder="Email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">Password:</label>
                                        {{-- <a class="float-right font-size-13 text-muted" href="#">Forget Password?</a> --}}
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password" value="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                Don't have an account?
                                                <a class="small" href="{{ url('registration') }}">Signup</a>
                                            </span>
                                            <button class="btn btn-primary">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-6 d-none d-md-block">
                        <img class="img-fluid" src="assets/images/others/login-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
