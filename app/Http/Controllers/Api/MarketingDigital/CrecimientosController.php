<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/06/2018
 * Time: 10:15
 */


namespace App\Http\Controllers\Api\MarketingDigital;

use App\Http\Controllers\Controller;
use App\Mail\MensajeBienvenida;
use App\PDO\Lib\ResponseFormatt;
use App\PDO\MySql\Magento\CustomerEntityPDO;
use App\PDO\MySql\MarketingDigital\MdmMigracionWebPDO;
use App\PDO\MySql\PortalEjecutivo\IncentivosPDO;
use App\PDO\Oracle\DMTransferWeb\TFConfiguracionPDO;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Helpers\Funciones;
use Mail;

class CrecimientosController extends Controller
{
    public function consultaPorEjecutivo($userid)
    {
        $mes_actual = env('CRECIMIENTO_MES_ACTUAL', 7);
        $mes_anterior = env('CRECIMIENTO_MES_ANTERIOR', 6);

        $registro_mes_actual = MdmMigracionWebPDO::getMonthlyReportByUser($mes_actual, $userid);
        if ($registro_mes_actual == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron datos para este usuario en el mes actual (Mes: " . $mes_actual . "). "
                    . "Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $registro_mes_anterior = MdmMigracionWebPDO::getMonthlyReportByUser($mes_anterior, $userid);
        if ($registro_mes_anterior == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(204)
                ->setResponse("No se encontraron datos para este usuario en el mes anterior (Mes: " . $mes_anterior . ")."
                    . " Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        // $crecimiento = 100 * (($registro_mes_actual[0]->getPWeb() / $registro_mes_anterior[0]->getPWeb()) - 1);
        $crecimiento = $this->calcularCrecimiento($registro_mes_actual[0]->getPWeb(), $registro_mes_anterior[0]->getPWeb());

        $arrayReturn = array(
            'mes_actual' => $registro_mes_actual[0],
            'mes_anterior' => $registro_mes_anterior[0],
            'crecimiento' => round($crecimiento, 2)
        );

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }

    public function consultaPorGrupoVenta($in_codcnl)
    {
        $mes_actual = env('CRECIMIENTO_MES_ACTUAL', 7);
        $mes_anterior = env('CRECIMIENTO_MES_ANTERIOR', 6);

        // Solo traer los ejecutivos del mes actual
        $registros_mes_actual = MdmMigracionWebPDO::getMonthlyReportBySalesGroup($mes_actual, $in_codcnl);
        if ($registros_mes_actual == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron datos para este grupo de venta en el mes actual (Mes: " . $mes_actual . "). "
                    . "Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $arrayReturn = null;
        // Recorremos todos los ejecutivos de este mes
        foreach ($registros_mes_actual as $registro) {
            // 1.- Traemos el mes anterior del ejecutivo que estamoos viendo
            $ejecutivo = $registro->getEjecutivo();
            $registro_mes_anterior = MdmMigracionWebPDO::getMonthlyReportByUser($mes_anterior, $ejecutivo);

            // 2.- Si tiene datos en el mes anterior, calcularemos su crecimiento
            // $crecimiento = ($registro_mes_anterior) ? 100 * ($registro->getPWeb() / $registro_mes_anterior[0]->getPWeb()) - 1 : 100;
            $crecimiento = ($registro_mes_anterior) ?  $this->calcularCrecimiento($registro->getPWeb(), $registro_mes_anterior[0]->getPWeb()) : 100;

            $arrayReturn[$ejecutivo] = array(
                'mes_actual' => $registro,
                'mes_anterior' => $registro_mes_anterior[0],
                'crecimiento' => round($crecimiento, 2)
            );
        }

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }

    public function consultaDeGrupos() {
        $mes_actual = env('CRECIMIENTO_MES_ACTUAL', 7);
        $mes_anterior = env('CRECIMIENTO_MES_ANTERIOR', 6);

        // Solo traer los grupos del mes actual
        $registros_mes_actual = MdmMigracionWebPDO::getSalesGroupMonthlyReport($mes_actual);
        if ($registros_mes_actual == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron datos de grupos de venta en el mes actual (Mes: " . $mes_actual . "). "
                    . "Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $arrayReturn = null;
        // Recorremos todos los grupos de venta de este mes
        foreach ($registros_mes_actual as $registro) {
            // 1.- Traemos el mes anterior del ejecutivo que estamoos viendo
            $grupo_de_venta = $registro->getGrupoVenta();
            $registro_mes_anterior = MdmMigracionWebPDO::getSalesGroupMonthlyReportBySalesGroup($mes_anterior, $grupo_de_venta);

            // 2.- Si tiene datos en el mes anterior, calcularemos su crecimiento
            // $crecimiento = ($registro_mes_anterior) ?  100 * ($registro->getPWeb() / $registro_mes_anterior[0]->getPWeb()) - 1 : 100;
            $crecimiento = ($registro_mes_anterior) ?  $this->calcularCrecimiento($registro->getPWeb(), $registro_mes_anterior[0]->getPWeb()) : 100;

            $arrayReturn[$grupo_de_venta] = array(
                'mes_actual' => $registro,
                'mes_anterior' => $registro_mes_anterior[0],
                'crecimiento' => round($crecimiento, 2)
            );
        }

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }

    public function consultaPorSupervisor($in_supervisor) {
        $mes_actual = env('CRECIMIENTO_MES_ACTUAL', 7);
        $mes_anterior = env('CRECIMIENTO_MES_ANTERIOR', 6);

        $registro_mes_actual = MdmMigracionWebPDO::getSpecificSupervisorMonthlyReport($mes_actual, $in_supervisor);
        if ($registro_mes_actual == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron datos para este supervisor en el mes actual (Mes: " . $mes_actual . "). "
                    . "Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $registro_mes_anterior = MdmMigracionWebPDO::getSpecificSupervisorMonthlyReport($mes_anterior, $in_supervisor);
        if ($registro_mes_anterior == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(204)
                ->setResponse("No se encontraron datos para este supervisor en el mes anterior (Mes: " . $mes_anterior . ")."
                    . " Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $crecimiento = $this->calcularCrecimiento($registro_mes_actual[0]->getPWeb(), $registro_mes_anterior[0]->getPWeb());

        $arrayReturn = array(
            'mes_actual' => $registro_mes_actual[0],
            'mes_anterior' => $registro_mes_anterior[0],
            'crecimiento' => round($crecimiento, 2)
        );

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }

    public function consultaDeSupervisores() {
        $mes_actual = env('CRECIMIENTO_MES_ACTUAL', 7);
        $mes_anterior = env('CRECIMIENTO_MES_ANTERIOR', 6);

        // Solo traer los grupos del mes actual
        $registros_mes_actual = MdmMigracionWebPDO::getSupervisorsMonthlyReport($mes_actual);
        if ($registros_mes_actual == null) {
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("No se encontraron datos de supervisores en el mes actual (Mes: " . $mes_actual . "). "
                    . "Por favor verificar");

            return $responseFormatt->returnToJson();
        }

        $arrayReturn = null;
        // Recorremos todos los supervisores de venta de este mes
        foreach ($registros_mes_actual as $registro) {
            // 1.- Traemos el mes anterior del ejecutivo que estamoos viendo
            $supervisor = $registro->getSupervisor();
            $registro_mes_anterior = MdmMigracionWebPDO::getSpecificSupervisorMonthlyReport($mes_anterior, $supervisor);

            // 2.- Si tiene datos en el mes anterior, calcularemos su crecimiento
            $crecimiento = ($registro_mes_anterior) ?  $this->calcularCrecimiento($registro->getPWeb(), $registro_mes_anterior[0]->getPWeb()) : 100;

            $arrayReturn[$supervisor] = array(
                'mes_actual' => $registro,
                'mes_anterior' => $registro_mes_anterior[0],
                'crecimiento' => round($crecimiento, 2)
            );
        }

        $responseFormatt = new ResponseFormatt();
        $responseFormatt
            ->setCode(200)
            ->setResponse($arrayReturn);

        return $responseFormatt->returnToJson();
    }

    private function calcularCrecimiento($porcentaje_actual, $porcentaje_anterior) {
        if($porcentaje_anterior <= 0) {
            return 0;
            // return $porcentaje_actual;
        }

        return 100 * (($porcentaje_actual / $porcentaje_anterior) - 1);
    }
}