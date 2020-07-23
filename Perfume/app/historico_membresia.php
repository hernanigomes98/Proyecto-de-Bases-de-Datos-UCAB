<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historico_membresia extends Model
{
    //
    protected $table = 'historico_membresia';
    protected $primaryKey = 'idhistmem';
    public $filleable = ['fechainicio', 'tipomiembro', 'fechafin', 'fk_proveedor', 'fk_productor'];
    public $timestamps = false;
}
