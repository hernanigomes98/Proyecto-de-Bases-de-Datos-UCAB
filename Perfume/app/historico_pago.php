<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historico_pago extends Model
{
    protected $table = 'historico_pago';
    protected $primaryKey = 'idhistpago';
    public $filleable = ['monto', 'fecha', 'fk_pedido'];
    public $timestamps = false;
}
