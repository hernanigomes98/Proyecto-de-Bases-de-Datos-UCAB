<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'idpedido';
    public $filleable = ['fecha', 'status', 'total', 'fk_idprov', 'fk_idprod', 'fechaconfir', 'nfactura', 'fk_condpartcontrato', 'fk_condpartpago', 'fk_condpartenvio', 'fk_condpartprov', 'fk_condpartprod'];
    public $timestamps = false;
}
