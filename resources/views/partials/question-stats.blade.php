<div class="stats text-center">
    <div class="votes">
        {{ $question->votes }}
        <div class="stat-name">
            votes
        </div>
    </div>
    <div class="answer-count">
        {{ $question->answers->count() }}
        <div class="stat-name">
            answers
        </div>
    </div>
</div>