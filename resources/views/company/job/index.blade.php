@extends('layouts.company')
@section('job.index', 'class=active')
@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Recent Jobs</h5>
                {{-- <div>
                    <a href="{{route('my-company.job.create',['company_id'=>$company->id])}}" class="btn btn-sm btn-primary">Post Job</a>
                </div> --}}
            </div>
            @if (session()->has('res'))
                <div class="alert alert-{{ session('res')['type'] }}">{{ session('res')['message'] }}</div>
            @endif
            <div class="m-t-30">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>position</th>
                                <th>vacancy</th>
                                <th>deadline</th>
                                <th>salary</th>
                                <th>education</th>
                                <th>experience</th>
                                <th>requirements</th>
                                <th>quizzes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company->jobs as $job)
                                <tr>
                                    <td>{{ $job->position }}</td>
                                    <td>{{ $job->vacancy }}</td>
                                    <td>{{ $job->deadline }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->education }}</td>
                                    <td>{{ $job->experience }}</td>
                                    <td>{{ $job->requirements }}</td>
                                    <td><a href="{{ url('quiz?id=' . $job->id) }}">manage quizzes</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('job/' . $job->id . '/edit') }}">Edit</a>
                                        |
                                        <a href="{{ url('job/' . $job->id . '/applications') }}">Applications</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
