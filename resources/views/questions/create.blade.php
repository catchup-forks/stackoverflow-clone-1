@extends('app')

@section('content')

    <h1>Create Question</h1>
    <hr/>
    {!! Form::model($question = new \App\Question, ['url' => 'questions']) !!}

    @include('questions.form', ['submitButtonText' => 'Add Question'])

    {!! Form::close() !!}


    @include('errors.list')
@stop

