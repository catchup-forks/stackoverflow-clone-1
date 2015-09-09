<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'user_id',
        'votes'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function question()
    {
        return $this->hasOne('App\Question', 'content_id');
    }
    public function answer()
    {
        return $this->hasOne('App\Answer', 'content_id');
    }

    public function comment()
    {
        return $this->hasOne('App\Comment', 'content_id');
    }

     public function comments()
    {
        return $this->hasMany('App\Comment', 'in_reply_to_id');
    }
}
