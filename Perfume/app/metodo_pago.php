<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metodo_pago extends Model
{
    //
    protected $table = 'metodo_pago';
    protected $primaryKey = 'idmetpago';
    public $filleable = ['tipopago','porcentajecuota','fk_proveedor','tiempocuota'];
    public $timestamps = false;
}
