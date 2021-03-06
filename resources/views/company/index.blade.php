@extends('layouts.company')
@section('main-content')
@section('home', 'class=active')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-md-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            @if (session('company')['image'])
                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="{{asset('storage/app/'.session('company')['image'])}}" alt="">
                                </div>
                            @else
                                <div class="avatar avatar-icon avatar-lg">
                                    <i class="anticon anticon-user"></i>
                                </div>
                            @endif
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5">{{ session('company')['name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="d-md-block d-none border-left col-1"></div>
                        <div class="col">
                            <ul class="list-unstyled m-t-10">
                                <li class="row">
                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                        <span>Email: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{session('company')['email']}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                        <span>Phone: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{session('company')['phone']}}</p>
                                </li>
                                <li class="row">
                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                        <span>Location: </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{session('company')['location']?->name}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5>Bio</h5>
                    <p>{{session('company')['description']}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
