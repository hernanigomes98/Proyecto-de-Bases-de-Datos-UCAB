<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pe_fa extends Model
{
    protected $table = 'pe_fa';
    protected $primaryKey = null;
    public $filleable = ['idperfume', 'idfamiliaolfativa'];
    public $incrementing = false;
    public $timestamps = false;
}
