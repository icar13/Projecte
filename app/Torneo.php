<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{

     protected $fillable = [
        'Nombre', 'Fecha', 'MaxParticipantes','Juego','Puntos','name_user_create',
    ];
}
