@extends('app')

@section('content')

    <h1>Users</h1>

    <hr/>

    @foreach($users as $user)
        <ul>
            <li> <a href="{{ url('/users', [$user->id]) }}">{{ $user->name }}</a></li>
        </ul>
    @endforeach
@stop

