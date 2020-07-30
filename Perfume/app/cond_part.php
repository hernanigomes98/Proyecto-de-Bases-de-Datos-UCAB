<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cond_part extends Model
{
    //
    protected $table = 'cond_part';
    protected $primaryKey = null;
    public $filleable = ['id_conpart', 'fk_contrato', 'fk_provcont','fk_prodcont','fk_metenvio','fk_pais','fk_proveedorenv','fk_metpago','fk_proveedorpago'];
    public $incrementing = false;
    public $timestamps = false;
}
