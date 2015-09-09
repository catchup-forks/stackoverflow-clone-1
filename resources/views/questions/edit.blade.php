@extends('app')

@section('content')
    <h1>Edit: {{ $question->title }}</h1>

    <hr/>

    {!! Form::model($question, ['method' => 'PATCH', 'action' => ['QuestionsController@update', $question->id]]) !!}

    @include('questions.form', ['submitButtonText' => 'Update Question'])

    {!! Form::close() !!}


    @include('errors.list')
@stop