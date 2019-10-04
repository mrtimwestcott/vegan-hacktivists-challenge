<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function store(Request $request) {
        $request->validate([
           'question' => ['required','min:5','regex:/\?$/'],
        ]);
        Question::create(['question'=>$request->question]);
        return redirect('/questions');
    }

    public function show(Question $question) {
        return view('questions.show', compact('question'));
    }
}
