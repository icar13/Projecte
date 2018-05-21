<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{

     protected $fillable = [
        'id', 'user_id', 'torneo_id','name'
    ];
}
