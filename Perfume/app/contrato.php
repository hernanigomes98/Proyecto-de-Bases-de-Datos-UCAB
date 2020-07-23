<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    //
    protected $table = 'contrato';
    protected $primaryKey = 'idcontrato';
    public $filleable = ['fechaemision', 'exclusivo', 'fk_proveedor', 'fk_productor', 'fechacancelacion', 'motivocancelacion', 'descuento','recargo','tiempodescuento'];
    public $timestamps = false;
}
