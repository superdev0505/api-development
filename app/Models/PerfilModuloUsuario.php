<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilModuloUsuario extends Model {
	protected $connection = 'mysqlcerberus';
    
    protected $table = "dg_perfil_modulo_permiso";
    
    protected $primaryKey = 'id_modulo';

    protected $fillable = array (
        'id_perfil'
    
    );

    public $timestamps = false;
}