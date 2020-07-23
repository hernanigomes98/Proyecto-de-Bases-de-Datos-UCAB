<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class esencia_perfu extends Model
{
    protected $table = 'esencia_perfu';
    protected $primaryKey = 'tscacas';
    public $filleable = ['nombre', 'tipo', 'codint'];
    public $timestamps = false;
}
