<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class escala extends Model
{
    //
    protected $table = 'escala';
    protected $primaryKey = 'fechainicio';
    public $filleable = ['rangoinicio', 'rangofin', 'fechafin', 'fk_productor'];
    public $timestamps = false;
}
