<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">

    <title>Laravel</title>
<body>
    <div class="container">
        <h1>Q&A</h1>

        <form method="post" action="/questions">
            @csrf
            <div class="form-group">
                <label for="question">Ask a question:</label>
                <textarea class="form-control" name="question" id="question" required>{{old('question')}}</textarea>
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

        <h2>Browse questions:</h2>
        <ul class="list-group">
        @foreach($questions as $question)
            <li class="list-group-item">{{ $question->question }}</li>
        @endforeach
        </ul>
    </div>
</body>
</html>
