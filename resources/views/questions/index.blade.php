@extends('app')

@section('content')

<h1>Questions @if(isset($tag)) tagged: {{ $tag->name }} @endif</h1>

@foreach($questions as $question)

    <div id="question-{{ $question->id }}" class="question">

        @include('partials.question-stats')

        <div class="question-summary">



            <a href="{{route('questions.show', [$question->id])}}"><h3>{{ $question->title }}</h3></a>
            {{ $question->body }}

            <div class="question-meta">

               @include('partials.tags')
               @include('partials.author', ['content' => $question, 'interaction' => 'asked'])

            </div>
        </div>
    </div>

@endforeach

{!! $questions->render() !!}

@stop

