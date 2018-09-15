<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:21
 */

namespace App\PDO\MySql\MarketingDigital;

use App\Entities\MySql\Cerberus\MdmMigracionGrupo;
use App\Entities\MySql\Cerberus\MdmMigracionSupervisor;
use App\Entities\MySql\Cerberus\MdmMigracionUsuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class MdmMigracionWebPDO extends Model
{
    public static function getMonthlyReportByUser($in_month, $in_userid) {
        $sql = 'SELECT supervisor, grupo_venta, rut, ejecutivo, '
            . ' mes, anio, n_tlmk, n_web, '
            . ' p_tlmk, p_web '
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number '
            . ' AND ejecutivo = :user_id ';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
            'user_id' => $in_userid
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnMigracionFormat($resultado);
        return $arrayReturn;
    }

    public static function getMonthlyReportBySalesGroup($in_month, $in_codcnl) {
        $sql = 'SELECT supervisor, grupo_venta, rut, ejecutivo, '
            . ' mes, anio, n_tlmk, n_web, '
            . ' p_tlmk, p_web '
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number '
            . ' AND grupo_venta = :canal_code ';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
            'canal_code' => $in_codcnl
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnMigracionFormat($resultado);
        return $arrayReturn;
    }

    public static function getSalesGroupMonthlyReport($in_month) {
        $sql = 'SELECT supervisor, grupo_venta, mes, anio,'
            . ' sum(n_tlmk) as n_tlmk, sum(n_web) as n_web'
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number '
            . ' GROUP BY supervisor, grupo_venta, mes, anio';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnGrupoMigracionFormat($resultado);
        return $arrayReturn;
    }

    public static function getSalesGroupMonthlyReportBySalesGroup($in_month, $in_codcnl) {
        $sql = 'SELECT supervisor, grupo_venta, mes, anio,'
            . ' sum(n_tlmk) as n_tlmk, sum(n_web) as n_web'
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number'
            . ' AND grupo_venta = :sales_group'
            . ' GROUP BY supervisor, grupo_venta, mes, anio';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
            'sales_group' => $in_codcnl
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnGrupoMigracionFormat($resultado);
        return $arrayReturn;
    }

    public static function getSpecificSupervisorMonthlyReport($in_month, $in_superuserid) {
        $sql = 'SELECT supervisor, mes, anio,'
            . ' sum(n_tlmk) as n_tlmk, sum(n_web) as n_web'
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number'
            . ' AND supervisor = :supervisor_id'
            . ' GROUP BY supervisor, mes, anio';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
            'supervisor_id' => $in_superuserid
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnSupervisorMigracionFormat($resultado);
        return $arrayReturn;
    }

    public static function getSupervisorsMonthlyReport($in_month) {
        $sql = 'SELECT supervisor, mes, anio,'
            . ' sum(n_tlmk) as n_tlmk, sum(n_web) as n_web'
            . ' FROM mdm_migracion_web'
            . ' WHERE mes = :month_number'
            . ' GROUP BY supervisor, mes, anio';

        $resultado = DB::connection('mysql_cerberus_marketingdigital')->select($sql, [
            'month_number' => $in_month,
        ]);

        $arrayReturn = MdmMigracionWebPDO::returnSupervisorMigracionFormat($resultado);
        return $arrayReturn;
    }

    private static function returnMigracionFormat($registros) {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $migracion = new MdmMigracionUsuario($registro);
            $arrayReturn[] = $migracion;
        }

        return $arrayReturn;
    }

    private static function returnGrupoMigracionFormat($registros) {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $migracion = new MdmMigracionGrupo($registro);
            $arrayReturn[] = $migracion;
        }

        return $arrayReturn;
    }

    private static function returnSupervisorMigracionFormat($registros) {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $migracion = new MdmMigracionSupervisor($registro);
            $arrayReturn[] = $migracion;
        }

        return $arrayReturn;
    }
}
