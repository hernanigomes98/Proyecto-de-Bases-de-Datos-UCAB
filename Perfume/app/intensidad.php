<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class intensidad extends Model
{
    protected $table = 'intensidad';
    protected $primaryKey = 'idintensidad';
    public $filleable = ['tipo', 'concentracion', 'fk_perfume', 'descripcion'];
    public $timestamps = false;
}
