<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    //
    protected $table = 'pais';
    protected $primaryKey = 'idpais';
    public $filleable = ['nombrepais'];
    public $timestamps = false;
}
