<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class origen extends Model
{
    protected $table = 'origen';
    protected $primaryKey = null;
    public $filleable = ['idpais', 'idmateriapries'];
    public $incrementing = false;
    public $timestamps = false;
}
