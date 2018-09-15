<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OracleTest extends Model {

    protected $connection = 'oracle_dmventas';
    protected $table = "ma_usuario";
    //protected $primaryKey = 'id';
    protected $fillable = array(
        'NUMNVT',
        'NUMWEB',
        'FECEMI',
        'CODEST',
        'TIPWEB',
        'CODEMP'
    );
    public $timestamps = false;

}
