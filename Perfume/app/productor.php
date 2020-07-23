<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productor extends Model
{
    //
    protected $table = 'productor';
    protected $primaryKey = 'idproductor';
    public $filleable = ['nombre', 'correo', 'direccion', 'codigopostal', 'telefono', 'paginaweb', 'fkpais', 'fkasocnac'];
    public $timestamps = false;
}
