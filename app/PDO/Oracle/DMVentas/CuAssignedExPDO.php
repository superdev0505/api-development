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

class CuAssignedExPDO extends Model
{
    public static function gutCompanyByCustomerRut($customer_rut) {
        $sql = "SELECT comapany_id FROM dual WHERE rut_cli = :rut_cli";

        $resultado = DB::connection('oracle_dmventas_dev')->select($sql, [
            'rut_cli' => $customer_rut
        ]);

        return $resultado;
    }
}