<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perfume extends Model
{
    protected $table = 'perfume';
    protected $primaryKey = 'idperfume';
    public $filleable = ['nombre', 'tipo', 'genero', 'edad', 'fk_productor'];
    public $timestamps = false;
}
