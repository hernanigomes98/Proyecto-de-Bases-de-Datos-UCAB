<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otros_per extends Model
{
    protected $table = 'otros_per';
    protected $primaryKey = null;
    public $filleable = ['idotrosing', 'idperfume'];
    public $incrementing = false;
    public $timestamps = false;
}
