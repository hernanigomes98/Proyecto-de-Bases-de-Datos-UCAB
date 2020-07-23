<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pres_ing extends Model
{
    protected $table = 'pres_ing';
    protected $primaryKey = 'idpresing';
    public $filleable = ['volml', 'precio', 'idotrosing', 'idmateriapries'];
    public $timestamps = false;
}
