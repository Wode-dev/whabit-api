<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomplishment extends Model
{
    protected $fillable = [
        'date'
    ];

    public function habit()
    {
        return $this->belongsTo('App\Habit', 'habit_id', 'id');
    }
}
