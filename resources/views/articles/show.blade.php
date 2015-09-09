@extends('app')

@section('content')

    <article>
        <h1>{{$article->title}}</h1>
        {{ $article->published_at }} /
        User: {{ $article->user->name }}

        @if(auth()->check())
            @if(auth()->user()->id == $article->user_id)
                / <a href="{{ route('articles.edit', $article->id) }}">Edit</a>
            @endif
        @endif

        <div class="body">{{$article->body}}</div>

        @unless($article->tags->isEmpty())
            <h5>Tags:</h5>
            <ul>
               @foreach($article->tags as $tag)
                   <li>{{ $tag->name }}</li>
               @endforeach
        @endunless
        </ul>
    </article>
@stop

