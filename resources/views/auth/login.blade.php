@extends('app')

@section('content')
<h1>Login</h1>
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}


    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="checkbox">

        {!! Form::checkbox('remember') !!}
        Remember Me:
    </div>

    <div class="form-group">
        {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
    </div>

</form>

@stop