<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 25-01-2018
 * Time: 14:40
 */

namespace App\PDO\Oracle\DMTransferWeb;

use App\Entities\Oracle\DMTrasferWeb\TFConfiguracion;
use App\PDO\MySql\Magento\EmailCobranzaPDO;
use App\PDO\MySql\Magento\SalesFlatOrderPDO;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class TFConfiguracionPDO extends Model
{
    public static function getCredencialesCorreoDimerc()
    {
        $sql = "select id_sitio, nombre, user_ftp, pass_ftp, server_ftp, user_mail, pass_mail, "
            . " server_mail, lista_precio_base, observacion, "
            . " server_mail as host, observacion as port "
            . " from tf_configuracion "
            . " where id_sitio = 6";

        $resultado = DB::connection('oracle_dmtransferweb')->select($sql);
        $arrayReturn = TFConfiguracionPDO::returnRegistrosComprasFormat($resultado);
        return $arrayReturn;
    }

    public static function returnRegistrosComprasFormat($registros)
    {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $configur = new TFConfiguracion();
            $configur->setIdSitio($registro->id_sitio);
            $configur->setNombre($registro->nombre);
            $configur->setUserFtp($registro->user_ftp);
            $configur->setPassFtp($registro->pass_ftp);
            $configur->setServerFtp($registro->server_ftp);
            $configur->setUserMail($registro->user_mail);
            $configur->setPassMail($registro->pass_mail);
            $configur->setServerMail($registro->server_mail);
            $configur->setListaPrecioBase($registro->lista_precio_base);
            $configur->setObservacion($registro->observacion);
            $arrayReturn[] = $configur;
        }

        return $arrayReturn;
    }
}