@extends('app')

@section('content')


    <h1>Create Comment for question: {{ $question->title }}</h1>
    <p>
        {{ $question->body }}
    </p>
    <hr/>
    {!! Form::model($comment = new \App\Comment, ['route' => ['questions.comments.store', $question->id]]) !!}

    @include('comments.form', ['submitButtonText' => 'Add comment'])

    {!! Form::close() !!}


    @include('errors.list')


@stop