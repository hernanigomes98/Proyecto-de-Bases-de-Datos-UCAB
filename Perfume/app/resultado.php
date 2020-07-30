<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resultado extends Model
{
    //
    protected $table = 'resultado';
    protected $primaryKey = 'idresultado';
    public $filleable = ['fechaevaluado','resultado', 'tipoevaluacion', 'fk_proveedor', 'fk_productor'];
    public $timestamps = false;
}
