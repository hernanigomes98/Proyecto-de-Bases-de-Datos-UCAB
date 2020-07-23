<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class monolitico extends Model
{
    protected $table = 'monolitico';
    protected $primaryKey = null;
    public $filleable = ['fk_perfume', 'fk_esenperfume'];
    public $incrementing = false;
    public $timestamps = false;
}
