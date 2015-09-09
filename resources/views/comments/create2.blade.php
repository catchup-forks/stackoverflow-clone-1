
    <h1>Create Comment for answer</h1>
    <hr/>
    {!! Form::model($comment = new \App\Comment, ['url' => "questions/$question->id/answers/$answer->id/comments"]) !!}

    @include('comments.form', ['submitButtonText' => 'Add comment'])

    {!! Form::close() !!}


    @include('errors.list')


