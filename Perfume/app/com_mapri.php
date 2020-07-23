<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class com_mapri extends Model
{
    protected $table = 'com_mapri';
    protected $primaryKey = null;
    public $filleable = ['idproveedor', 'idproductor', 'idotrosing', 'idmateriapries'];
    public $incrementing = false;
    public $timestamps = false;
}
