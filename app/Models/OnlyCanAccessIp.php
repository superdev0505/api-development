<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlyCanAccessIp extends Model {

    protected $connection = 'mysqlcerberus';
    protected $table = "dp_only_can_access_ip";
    protected $primaryKey = 'id';
    protected $fillable = array(
        'ip_request',
        'api_key',
        'module',
        'active',
        'description'
    );
    public $timestamps = false;

}
