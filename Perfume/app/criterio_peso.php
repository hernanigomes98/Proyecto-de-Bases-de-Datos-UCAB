<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class criterio_peso extends Model
{
    //
    protected $table = 'criterio_peso';
    protected $primaryKey = 'fechainicio';
    public $filleable = ['fechafin', 'peso', 'tipoformula', 'fk_criterio','fk_productor'];
    public $timestamps = false;
}
