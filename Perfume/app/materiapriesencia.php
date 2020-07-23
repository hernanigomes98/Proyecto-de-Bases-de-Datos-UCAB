<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materiapriesencia extends Model
{
    protected $table = 'materiapriesencia';
    protected $primaryKey = 'idcnumber';
    public $filleable = ['nombre', 'descripcion', 'tipoextraccion', 'fk_proveedor', 'solubilidad'];
    public $timestamps = false;
}
