<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function deleteQuiz($id)
    {
        try {
            Quiz::where('id', $id)->delete();
            return redirect()->back()->with('res', ['type' => 'success', 'message' => 'Succesfully Deleted']);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('res', ['type' => 'danger', 'message' => json_encode($ex->getMessage())]);
        }
    }

    public function getQuizzesByJob()
    {
        $job_id = request('id');
        $quizzes = Quiz::where('job_id', $job_id)->get();
        return view('company.quiz.index', ['job_id' => $job_id, 'quizzes' => $quizzes]);
    }
    public function getQuizzesByJobApi()
    {
        $job_id = request('id');
        return Quiz::where('job_id', $job_id)->get();
    }

    public function createQuizesByJob($job_id)
    {
        return view('company.quiz.create', ['job_id' => $job_id]);
    }

    public function insertQuizesByJob(Request $request)
    {
        try {
            $all = $request->all();
            unset($all['_token']);
            Quiz::insert($all);
            return redirect('quiz?id=' . $request->job_id)->with('res', ['type' => 'success', 'message' => 'Succesfully added']);
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('res', ['type' => 'danger', 'message' => json_encode($ex->getMessage())]);
        }
    }

    public function editQuiz($id)
    {
        return view('company.quiz.edit', ['quiz' => Quiz::where('id', $id)->first()]);
    }

    public function updateQuiz(Request $request)
    {
        $quiz = Quiz::where('id', $request->id)->first();
        $quiz->question = $request->question;
        $quiz->option1 = $request->option1;
        $quiz->option2 = $request->option2;
        $quiz->option3 = $request->option3;
        $quiz->option4 = $request->option4;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();
        return redirect('quiz?id=' . $quiz->job_id);
    }
}
