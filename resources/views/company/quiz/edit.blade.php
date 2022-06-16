@extends('layouts.admin')
@section('main-content')
    @if (session('res'))
        <div class="alert alert-{{ session('res')['type'] }}">
            {{ session('res')['message'] }}
        </div>
    @endif
    <div class="card">
        <div class="card-body row">
            <form action="{{ url('quiz/update') }}" method="post" class="col-lg-6 m-auto">
                @csrf
                <input type="hidden" class="form-control mb-2" name="id" placeholder="Category"
                    value="{{ $quiz->id }}" required readonly>
                <input type="text" class="form-control mb-2" name="question" placeholder="Question" required value="{{ $quiz->question }}">
                <select name="correct_answer" id="" required class="form-control mb-2">
                    <option value="{{$quiz->correct_answer}}" selected>{{$quiz->correct_answer}}</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
                <input type="text" class="form-control mb-2" name="option1" placeholder="Option 1" value="{{ $quiz->option1 }}" required>
                <input type="text" class="form-control mb-2" name="option2" placeholder="Option 2" value="{{ $quiz->option2 }}" required>
                <input type="text" class="form-control mb-2" name="option3" placeholder="Option 3" value="{{ $quiz->option3 }}" required>
                <input type="text" class="form-control mb-2" name="option4" placeholder="Option 4" value="{{ $quiz->option4 }}" required>
                <button type="submit" class="btn btn-primary d-block ml-auto">Submit</button>
            </form>
        </div>
    </div>
@endsection
