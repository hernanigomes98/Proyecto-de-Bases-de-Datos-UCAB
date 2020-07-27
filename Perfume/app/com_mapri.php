<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class com_mapri extends Model
{
    protected $table = 'com_mapri';
    protected $primaryKey = 'idcommapri';
    public $filleable = ['idcontrato', 'idproveedor', 'idproductor', 'idotrosing', 'idmateriapries'];
    public $incrementing = false;
    public $timestamps = false;
}
