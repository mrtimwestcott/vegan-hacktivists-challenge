<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Displays a list of all questions sorted by newest first
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $questions = Question::all()->sortByDesc(function($question) {
            return $question->created_at;
        });
        return view('questions.index', compact('questions'));
    }

    /**
     * Stores the question and redirects to the list of questions
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $request->validate([
           'question' => ['required','min:5','regex:/\?$/'],
        ]);
        Question::create(['question'=>$request->question]);
        return redirect('/questions');
    }

    /**
     * Displays a question with all answers
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Question $question) {
        return view('questions.show', compact('question'));
    }
}
