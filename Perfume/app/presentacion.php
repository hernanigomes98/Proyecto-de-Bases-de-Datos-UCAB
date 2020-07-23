<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    protected $table = 'presentacion';
    protected $primaryKey = 'idpresentacion';
    public $filleable = ['volml', 'fk_intensidad', 'fk_perfume'];
    public $timestamps = false;
}
