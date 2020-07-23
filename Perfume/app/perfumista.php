<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perfumista extends Model
{
    protected $table = 'perfumista';
    protected $primaryKey = 'docidentificacion';
    public $filleable = ['nombre1', 'apellido1', 'genero', 'fk_pais', 'nombre2', 'apellido2'];
    public $timestamps = false;
}
