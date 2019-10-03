<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
<body>
    <h1>Q&A</h1>
    <ul>
    @foreach($questions as $question)
        <li>{{ $question->question }}</li>
    @endforeach
    </ul>
    <form method="post" action="/questions">
        @csrf
        <div>
            <textarea name="question" required>{{old('question')}}</textarea>
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
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
