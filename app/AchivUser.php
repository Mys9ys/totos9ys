<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AchivUser extends Model
{
    protected $table = 'achiev_user';

    protected $fillable = [
        'user', 'achiev', 'count'
    ];
}
