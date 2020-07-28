<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    public function accomplishments()
    {
        return $this->hasMany('App\Accomplishment', 'habit_id', 'id');
    }
}
