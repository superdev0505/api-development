<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model {
	protected $connection = 'mysqlcerberus';
    
    protected $table = "dg_grupo_usuario";
    
    protected $primaryKey = 'id_grupo';

    protected $fillable = array (
        'id_perfil'
    );

    public $timestamps = false;
}