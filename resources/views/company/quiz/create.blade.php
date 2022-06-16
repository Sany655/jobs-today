@extends('layouts.admin')
@section('main-content')
    @if (session('res'))
        <div class="alert alert-{{ session('res')['type'] }}">
            {{ session('res')['message'] }}
        </div>
    @endif
    <div class="card">
        <div class="card-body row">
            <form action="{{ url('quiz/create') }}" method="post" class="col-lg-6 m-auto">
                @csrf
                <input type="hidden" class="form-control mb-2" name="job_id" placeholder="Job"
                    value="{{ $job_id }}" required readonly>
                <input type="text" class="form-control mb-2" name="question" placeholder="Question" required>
                <select name="correct_answer" id="" required class="form-control mb-2">
                    <option value="" selected>Correct Option</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
                <input type="text" class="form-control mb-2" name="option1" placeholder="Option 1" required>
                <input type="text" class="form-control mb-2" name="option2" placeholder="Option 2" required>
                <input type="text" class="form-control mb-2" name="option3" placeholder="Option 3" required>
                <input type="text" class="form-control mb-2" name="option4" placeholder="Option 4" required>
                <button type="submit" class="btn btn-primary d-block ml-auto">Submit</button>
            </form>
        </div>
    </div>
@endsection
