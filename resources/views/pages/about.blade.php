@extends('app')

@section('content')
    <h1>About me: {{ $name }}</h1>
    @if(count($people))
    <ul>
        @foreach($people as $person)
            <li>{{ $person }}</li>
        @endforeach
    </ul>
    @endif
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A,        architecto beatae culpa debitis dolor, dolore eaque excepturi hic iusto laboriosam magni molestias nemo officia porro praesentium quae quam repellat repellendus?
    </p>
@stop