
    <h1>Create Answer</h1>
    <hr/>
    {!! Form::model($answer = new \App\Answer, ['action' => ["AnswersController@store", $question->id]]) !!}

    @include('answers.form', ['submitButtonText' => 'Add Answer'])

    {!! Form::close() !!}


    @include('errors.list')


