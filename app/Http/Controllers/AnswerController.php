<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswerController extends Controller
{
    public function store(Question $question, Request $request) {
        $request->validate([
            'answer' => ['required','min:5'],
        ]);

        Answer::create([
            "question_id" => $question->id,
            'answer' => $request->answer
        ]);

        return redirect('/questions/' . $question->id);
    }
}
