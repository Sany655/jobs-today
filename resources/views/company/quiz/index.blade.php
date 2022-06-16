@extends('layouts.company')
@section('job.index', 'class=active')
@section('main-content')
    <div class="card">
        <div class="card-body">
            <a href="{{ url('quiz/create/' . $job_id) }}"><button class="btn btn-primary d-block ml-auto">Create
                    Quiz</button></a>
            <div class="m-t-25">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Correct Option</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ $quiz->question }}</td>
                                    <td>{{ $quiz->correct_answer }}</td>
                                    <td>{{ $quiz->option1 }}</td>
                                    <td>{{ $quiz->option2 }}</td>
                                    <td>{{ $quiz->option3 }}</td>
                                    <td>{{ $quiz->option4 }}</td>
                                    <td><a class="btn btn-sm btn-warning" href="{{url('quiz/edit/' . $quiz->id)}}">Edit</a></td>
                                    <form action="{{ url('quiz/delete/' . $quiz->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <td><button type="submit" class="btn btn-sm btn-danger">Delete</button></td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Question</th>
                                <th>Correct Option</th>
                                <th>Option 1</th>
                                <th>Option 2</th>
                                <th>Option 3</th>
                                <th>Option 4</th>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
