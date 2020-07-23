<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prohibido extends Model
{
    //
    protected $table = 'prohibido';
    protected $primaryKey = 'idtscacas';
    public $filleable = ['nombre'];
    public $timestamps = false;
}
