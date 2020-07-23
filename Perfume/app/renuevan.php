<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class renuevan extends Model
{
    //
    protected $table = 'renuevan';
    protected $primaryKey = 'idrenueva';
    public $filleable = ['fecha','fk_contrato','fk_proveedor','fk_productor'];
    public $timestamps = false;
}
