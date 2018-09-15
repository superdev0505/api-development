<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestrictAccessIp extends Model {

    protected $connection = 'mysqlcerberus';
    protected $table = "dg_restrict_access_ip";
    protected $primaryKey = 'id';
    protected $fillable = array(
        'ip_request',
        'api_key',
        'module',
        'active'
    );
    public $timestamps = false;

}
