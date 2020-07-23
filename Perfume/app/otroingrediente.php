<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otroingrediente extends Model
{
    protected $table = 'otroingrediente';
    protected $primaryKey = 'idotrosing';
    public $filleable = ['nombre', 'descripcion', 'fk_proveedor', 'ipc', 'tscacas'];
    public $timestamps = false;
}
