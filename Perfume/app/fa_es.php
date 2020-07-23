<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fa_es extends Model
{
    protected $table = 'fa_es';
    protected $primaryKey = null;
    public $filleable = ['idesenciaperfume', 'idfamiliaolfativa'];
    public $incrementing = false;
    public $timestamps = false;
}
