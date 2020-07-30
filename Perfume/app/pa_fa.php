<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pa_fa extends Model
{
    protected $table = 'pa_fa';
    protected $primaryKey = null;
    public $filleable = ['idpalabraclave', 'idfamiliaolfativa', 'tipo'];
    public $incrementing = false;
    public $timestamps = false;
}
