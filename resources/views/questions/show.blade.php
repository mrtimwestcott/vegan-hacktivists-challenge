@extends('layouts.layout')

@section('title', 'This is a question')

@section('content')
    <h1>{{$question->question}}</h1>
    <ul class="list-group">
        @foreach($question->answers as $answer)
            <li class="list-group-item">{{$answer->answer}}</li>
        @endforeach
    </ul>

    <form method="post" action="/questions/{{$question->id}}">
        @csrf
        <div class="form-group">
            <label for="answer">Answer the question:</label>
            <textarea class="form-control" name="answer" id="answer" required>{{old('answer')}}</textarea>
        </div>
        @if($errors->any())
            <div>
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
