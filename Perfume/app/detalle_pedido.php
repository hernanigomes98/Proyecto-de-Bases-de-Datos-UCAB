<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_pedido extends Model
{
    protected $table = 'detalle_pedido';
    protected $primaryKey = 'iddetalleped';
    public $filleable = ['cantidad', 'fk_pedido', 'fk_presing'];
    public $timestamps = false;
}
