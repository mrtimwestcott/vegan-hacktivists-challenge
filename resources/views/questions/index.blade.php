@extends('layouts.layout')

@section('title', 'Questions')

@section('content')
    <form method="post" action="/questions" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="question">Ask a question:</label>
            <textarea class="form-control" name="question" id="question" placeholder="{{ $placeholder }}" required>{{old('question')}}</textarea>
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
            <button class="btn btn-primary float-right" type="submit">Ask it!</button>
        </div>
    </form>

    <h2 class="mt-5">Browse questions:</h2>
    <ul class="list-group">
    @foreach($questions as $question)
        <li class="list-group-item">
            <a href="/questions/{{$question->id}}" class="d-flex justify-content-between">
                {{ $question->question }}
                <span class="badge badge-primary">{{ $question->answers->count() }} answers</span>
            </a>
        </li>
    @endforeach
    </ul>
@endsection
