<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class per_per extends Model
{
    protected $table = 'per_per';
    protected $primaryKey = null;
    public $filleable = ['idperfume', 'idperfumista'];
    public $incrementing = false;
    public $timestamps = false;
}
