<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familia_olfativa extends Model
{
    protected $table = 'familia_olfativa';
    protected $primaryKey = 'idfamiliaolfativa';
    public $filleable = ['nombre', 'descripcion'];
    public $timestamps = false;
}
