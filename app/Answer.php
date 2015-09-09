<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HumanDates;

    protected $fillable = [
        'content_id',
        'question_id',
        'body',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
