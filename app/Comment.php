<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HumanDates;

    protected $fillable = [
        'content_id',
        'in_reply_to_id',
        'body',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
