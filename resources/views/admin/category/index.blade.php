@extends('layouts.admin')

@section('main-content')
@section('category.index', 'class=active')
@if (Session::has('alert'))
    <div class="alert alert-{{ session('alert') }}">{{ session('res') }}</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="m-t-25">
            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td><a href="{{ route('category.edit', $category->id) }}"><button
                                            class="btn btn-sm btn-warning">Edit</button></a></td>
                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <td><button type="submit" class="btn btn-sm btn-danger">Delete</button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Quizes</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
