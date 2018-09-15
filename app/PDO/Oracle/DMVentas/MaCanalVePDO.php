<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 24/06/2018
 * Time: 21:19
 */

namespace App\PDO\Oracle\DMVentas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MaCanalVePDO extends Model
{
    public static function existSalesGroupByCodcnl($in_codcnl) {
        $sql = "SELECT COUNT(*) AS existe FROM ma_canalve WHERE codcnl = :canal_code";

        $resultado = DB::connection('oracle_dm_ventas')->select($sql, [
            'canal_code' => $in_codcnl
        ]);

        return ($resultado != null && $resultado[0]->existe > 0)
            ? true : false;
    }
}