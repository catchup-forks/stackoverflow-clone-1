@extends('app')

@section('content')


    <h1>Create Comment for answer: {{ $answer->id }}</h1>
    <p>{{ $answer->body }}</p>
    <hr/>
    {!! Form::model($comment = new \App\Comment, ['route' => ['answers.comments.store', $answer->id]]) !!}

    @include('comments.form', ['submitButtonText' => 'Add comment'])

    {!! Form::close() !!}


    @include('errors.list')


@stop