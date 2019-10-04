@extends('layouts.layout')

@section('title', 'This is a question')

@section('content')
    <h2>{{$question->question}}</h2>
    <ul class="list-group">
        @foreach($answers as $answer)
            <li class="list-group-item">{{$answer->answer}}</li>
        @endforeach
    </ul>
    @if(!$question->answers->count())
        <div>There are no answers! Perhaps you could be the first!</div>
    @endif

    <form method="post" action="/questions/{{$question->id}}" class="mt-5">
        @csrf
        <div class="form-group">
            <label for="answer">What's your answer?</label>
            <textarea class="form-control" name="answer" id="answer" required>{{old('answer')}}</textarea>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
@endsection
