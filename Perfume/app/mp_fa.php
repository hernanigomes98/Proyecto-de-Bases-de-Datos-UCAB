<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mp_fa extends Model
{
    protected $table = 'mp_fa';
    protected $primaryKey = null;
    public $filleable = ['idfamiliaolfativa', 'idmateriapries'];
    public $incrementing = false;
    public $timestamps = false;
}
