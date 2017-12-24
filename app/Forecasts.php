<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecasts extends Model
{
    //
    protected $table = 'forecast_cup17';

    protected $fillable =[
        'forecast_datetime',
        'match_ID', 'User_ID', 'goal_home' , 'goal_visit', 'goal_margin',
        'goal_sum', 'result', 'possession', 'possessionResult', 'corner',
        'yellow', 'penalty', 'penaltyCheck', 'red', 'redCardCheck'
    ];
}
