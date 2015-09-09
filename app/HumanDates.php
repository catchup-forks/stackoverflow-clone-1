<?php

namespace App;

use Carbon\Carbon;


trait HumanDates
{
    public function getCreatedAtHumansAttribute()
    {
        $date = $this->created_at;
        if ($date ->diffInMonths(Carbon::now())  >= 1) {
            return $date->format('j M Y , g:ia');
        } else {
            return $date->diffForHumans();
        }
    }
}
