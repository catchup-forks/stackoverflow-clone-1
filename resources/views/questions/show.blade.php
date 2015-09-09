@extends('app')

@section('content')

<h1>{{$question->title}}</h1>

<div id="question-{{ $question->id }}" class="question">
    @include('partials.voter')
    <div class="question-summary">

        {{ $question->body }}

        <div class="question-meta">

            @include('partials.tags')
            @include('partials.author', ['content' => $question, 'interaction' => 'asked'])

        </div>

        @include('partials.comments', ['content' => $question, 'route' => 'questions.comments.create'])

    </div>
</div>

    @include('partials.answers')
    @include('answers.create')
@stop

