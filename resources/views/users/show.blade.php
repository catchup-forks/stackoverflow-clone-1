@extends('app')

@section('content')

    <h1>User: {{ $user->name }}</h1>
    <ul>
        <li>{{ $user->email }}</li>
    </ul>
    <h2>Questions:</h2>
    <ul>
        @foreach ($user->questions as $question)

         <li>   <a href="{{ route('questions.show', [$question->id]) }}">{{ $question->title }}</a></li>

        @endforeach
    </ul>

    <h2>Answers:</h2>
    <ul>
        @foreach ($user->answers as $answer)

         <li>   <a href="{{ route('questions.show', [$answer->question->id]) . '#answer-' . $answer->id }}">{{ $answer->question->title }}</a></li>

        @endforeach
    </ul>

    <h2>Comments on questions:</h2>

    <ul>
        @foreach ($user->commentsToQuestions as $comment)
           <li> <a href="{{ route('questions.show', [$comment->commentable->id]) . '#comment-' . $comment->id  }}">{{ $comment->commentable->title }}</a></li>
        @endforeach
    </ul>

    <h2>Comments on answers:</h2>
    <ul>
        @foreach ($user->commentsToAnswers as $comment)
           <li> <a href="{{ route('questions.show', [$comment->commentable->id]). '#comment-' . $comment->id  }}">{{ $comment->commentable->question->title }}</a></li>
        @endforeach
    </ul>


    <hr/>


@stop

