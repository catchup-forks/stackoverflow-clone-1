<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HumanDates;

    protected $fillable = [
        'content_id',
        'body',
        'title'
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with the current question.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('name')->toArray();
    }

    public function getAnswerCountAttribute()
    {
        $count = $this->answers->count() . " answer";

        if ($this->answers->count() !== 1) {
            $count .= 's';
        }

        return $count;
    }

}
