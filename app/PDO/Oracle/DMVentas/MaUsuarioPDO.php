<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:05
 */

namespace App\PDO\Oracle\DMVentas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MaUsuarioPDO extends Model
{
    public static function existsUserByUserid($in_user) {
        $sql = "SELECT COUNT(*) AS existe FROM ma_usuario WHERE userid = :user_id";

        $resultado = DB::connection('oracle_dm_ventas')->select($sql, [
            'user_id' => $in_user
        ]);

        return ($resultado != null && $resultado[0]->existe > 0)
            ? true : false;
    }
}