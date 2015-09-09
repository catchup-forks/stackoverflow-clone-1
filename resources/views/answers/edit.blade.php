@extends('app')

@section('content')
    <h1>Edit: {{ $answer->title }}</h1>

    <hr/>

    {!! Form::model($answer, ['method' => 'PATCH', 'action' => ['AnswersController@update', $question->id, $answer->id]]) !!}

    @include('answers.form', ['submitButtonText' => 'Update Answer'])

    {!! Form::close() !!}


    @include('errors.list')
@stop