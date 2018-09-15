<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model {
    protected $connection = 'mysqlcerberus';
    
    protected $table = "dg_usuario";
    
    protected $primaryKey = 'id';

    protected $fillable = array(
        'api_key'
    );

    public $timestamps = false;
}