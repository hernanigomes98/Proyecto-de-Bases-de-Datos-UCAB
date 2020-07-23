<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asociacion_nacional extends Model
{
    //
    protected $table = 'asociacion_nacional';
    protected $primaryKey = 'idasona';
    public $filleable = ['nombre','region','fkpais'];
    public $timestamps = false;
}
