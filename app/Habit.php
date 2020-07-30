<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable =[
        "name"
    ];
    public function accomplishments()
    {
        return $this->hasMany('App\Accomplishment', 'habit_id', 'id');
    }
}