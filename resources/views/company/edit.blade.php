@extends('layouts.company')

@section('main-content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form class="col-md-4 mx-auto" action="{{ url('company/' . $company->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" placeholder="name" id="name" name="name"
                        value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input value="{{ $company->email }}" type="email" class="form-control" placeholder="email" id="email"
                        name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Company Phone</label>
                    <input value="{{ $company->phone }}" type="text" class="form-control" placeholder="phone" id="phone"
                        name="phone">
                </div>
                <div class="form-group">
                    <label for="location">Company Location</label>
                    <select name="location_id" id="location" class="form-control">
                        @if ($company->location)
                            <option value="{{ $company->location->id }}">{{ $company->location->name }}</option>
                        @else
                            <option value="">Select a location</option>
                        @endif
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Company Description</label>
                    <textarea type="text" value="{{ $company->description }}" class="form-control"
                        placeholder="description" id="description" name="description"
                    >{{ $company->description }}</textarea>
                </div>
                <div class="form-group">
                    <img width="100%" src="{{ asset('storage/app/' . $company->image) }}" alt="">
                    <label for="image">Company Banner</label>
                    <input type="file" class="form-control" placeholder="image" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="password">Company Password</label>
                    <input value="{{ $company->password }}" type="password" class="form-control"
                        placeholder="{{ $company->password }}" id="password" name="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
