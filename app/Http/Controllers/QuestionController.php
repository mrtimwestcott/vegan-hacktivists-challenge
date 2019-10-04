<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    protected $placeholders = [
        "What is love?",
        "How deep is your love?",
        "Does your mother know?",
        "Do you really want to hurt me?",
        "What's new, pussycat?",
        "Can you feel the love tonight?",
        "Where is the love?",
        "How Much is that Doggie in the Window? (I do hope that doggie's not for sale, because we should abolish the property status of animals)",
        "Are You Lonesome Tonight?",
        "Who let the dogs out?"
    ];

    /**
     * Displays a list of all questions sorted by newest first
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $questions = Question::all()->sortByDesc(function($question) {
            return $question->created_at;
        });
        $placeholder = collect($this->placeholders)->random();
        return view('questions.index', compact('questions', 'placeholder'));
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
        $answers = $question->answers->sortBy(function($answer) {
            return $answer->created_at;
        });
        return view('questions.show', compact('question', 'answers'));
    }
}
