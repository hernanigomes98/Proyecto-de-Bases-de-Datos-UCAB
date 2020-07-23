<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pa_pr extends Model
{
    //
    protected $table = 'pa_pr';
    protected $primaryKey = null;
    public $filleable = ['idproductor', 'idpais'];
    public $incrementing = false;
    public $timestamps = false;
}
