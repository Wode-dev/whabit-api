<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        "name"
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function accomplishments()
    {
        return $this->hasMany('App\Accomplishment', 'habit_id', 'id');
    }
}
