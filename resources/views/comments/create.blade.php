
    <h1>Create Comment</h1>
    <hr/>
    {!! Form::model($comment = new \App\Comment, ['url' => "questions/$question->id/comments"]) !!}

    @include('comments.form', ['submitButtonText' => 'Add comment'])

    {!! Form::close() !!}


    @include('errors.list')


