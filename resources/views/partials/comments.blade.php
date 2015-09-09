<div class="comments">
    @foreach ($content->comments as $comment)

        <div id='comment-{{ $comment->id }}'>{{ $comment->body }} - <a href="{{ route('users.show', [$comment->user->id]) }}">{{ $comment->user->name }}</a> - {{ $comment->created_at_humans }}</div>

    @endforeach
</div>
<a href="{{ route($route, [$content->id]) }}" title="">Add a comment</a>