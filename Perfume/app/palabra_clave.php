<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class palabra_clave extends Model
{
    protected $table = 'palabra_clave';
    protected $primaryKey = 'idpalabraclave';
    public $filleable = ['palabra'];
    public $timestamps = false;
}
