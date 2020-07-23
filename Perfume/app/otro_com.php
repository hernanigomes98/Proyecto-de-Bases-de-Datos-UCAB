<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otro_com extends Model
{
    protected $table = 'otro_com';
    protected $primaryKey = null;
    public $filleable = ['idotrosing', 'idmateriaries'];
    public $incrementing = false;
    public $timestamps = false;
}
