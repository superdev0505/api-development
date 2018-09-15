<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-12-2017
 * Time: 10:23
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ApiRequest extends Model
{
    public $timestamps = false;

    protected $connection = 'mysqlcerberus';

    protected $table = "lg_api_request";

    protected $primaryKey = 'id';

    protected $fillable = array (
        'status_request',
        'api_key',
        'api_backend_name',
        'api_module',
        'request_method',
        'ip_address',
        'request_uri',
        'extend_request_uri',
        'user_id'
    );

    protected $guarded = array (
        'moment',
        'php_os',
        'php_uname',
        'request_time',
        'scheme',
        'remote_port',
        'http_user_agent',
        'http_cookie',
        'env_username',
        'uname_n'
    );


}