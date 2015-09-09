<h3>{{ $question->answer_count }}</h3>

@foreach ($question->answers as $answer)


<div id="answer-{{ $answer->id }}" class="answer">

    {{-- Send in stuff here later --}}
    @include('partials.voter')

    <div class="answer-content">
        {{ $answer->body }}
        <div class="answer-meta">
            @include('partials.author', ['content' => $answer, 'interaction' => 'answered'])
        </div>
        @include('partials.comments', ['content' => $answer, 'route' => 'answers.comments.create'])
    </div>
</div>

@endforeach

