<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metodo_envio extends Model
{
    //
    protected $table = 'metodo_envio';
    protected $primaryKey = 'idmetenvio';
    public $filleable = ['tipoenvio', 'fkpais', 'fk_proveedor', 'costoadicional'];
    public $timestamps = false;
}
