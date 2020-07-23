<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class per_es extends Model
{
    protected $table = 'per_es';
    protected $primaryKey = null;
    public $filleable = ['fk_perfume', 'fk_esenperfume', 'tiponota'];
    public $incrementing = false;
    public $timestamps = false;
}
