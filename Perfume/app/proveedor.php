<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    //
    protected $table = 'proveedor';
    protected $primaryKey = 'idproveedor';
    public $filleable = ['nombre', 'correo', 'direccion', 'codigopostal', 'telefono', 'paginaweb', 'fkpais', 'fkasocnac'];
    public $timestamps = false;
}
