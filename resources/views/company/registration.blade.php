@extends('layouts.layout')

@section('contents')
<div class="container-fluid">
    <div class="d-flex full-height p-v-15 flex-column">
        <div class="d-none d-md-flex p-h-40">
            <img src="assets/images/logo/logo.png" alt="">
        </div>
        <div class="container my-auto">
            <div class="row align-items-center">
                <div class="offset-md-1 col-md-6 d-none d-md-block">
                    <img class="img-fluid" src="assets/images/others/login-2.png" alt="">
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="m-t-20">Sign Up</h2>
                            <p class="m-b-30">Enter your valid information to create an account</p>
                            @if (session('res'))
                            <div class="alert alert-{{ session('res')['type'] }}">
                                {{ session('res')['message'] }}
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data" action="{{ url('registration') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="userName">Company Name:</label>
                                    <div class="input-affix">
                                        <i class="prefix-icon anticon anticon-user"></i>
                                        <input required type="text" class="form-control" id="userName"
                                            placeholder="Company Name" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="email">Company Email:</label>
                                    <div class="input-affix">
                                        <i class="prefix-icon anticon anticon-mail"></i>
                                        <input required type="email" class="form-control" id="email"
                                            placeholder="Company Email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="phone">Phone Number:</label>
                                    <div class="input-affix">
                                        <i class="prefix-icon anticon anticon-phone"></i>
                                        <input required type="tel" class="form-control" id="phone"
                                            placeholder="Phone Number" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="phone">Company Location:</label>
                                    <div class="input-affix">
                                        <i class="prefix-icon anticon anticon-compass"></i>
                                        <select name="location_id" id="" class="form-control" >
                                            <option value="">Select Location</option>
                                            @foreach ($locations as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="image">Image:</label>
                                    <div class="input-affix m-b-10">
                                        <input required type="file" id="image" name="pic" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-semibold" for="password">Password:</label>
                                    <div class="input-affix m-b-10">
                                        <i class="prefix-icon anticon anticon-lock"></i>
                                        <input required type="password" class="form-control" id="password"
                                            placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="font-size-13 text-muted">
                                            Already have an account?
                                            <a class="small" href="{{ url('login') }}">Signin</a>
                                        </span>
                                        <button class="btn btn-primary">Signup</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
