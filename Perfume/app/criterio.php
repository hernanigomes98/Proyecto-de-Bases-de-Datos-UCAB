<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class criterio extends Model
{
    //
    protected $table = 'criterio';
    protected $primaryKey = 'idcriterio';
    public $filleable = ['etiqueta', 'descripcion'];
    public $timestamps = false;
}
