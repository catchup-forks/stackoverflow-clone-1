<div class="tags">
@foreach($question->tags as $tag)
    <a href="{{ route('tags.show', [$tag->name]) }}" title="">{{ $tag->name }}</a>
@endforeach
</div>