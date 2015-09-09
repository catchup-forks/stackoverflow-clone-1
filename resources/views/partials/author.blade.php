<div class="author-info">
    <img class="gravatar" src="{{ $question->user->gravatar }}?s=40">
    <div class="author">
        <a href="{{route('users.show', [$content->user->id])}}">{{ $content->user->name }}</a>
    </div>
    <div class="date">
         {{ $interaction . ' ' . $content->created_at_humans }}
    </div>
</div>