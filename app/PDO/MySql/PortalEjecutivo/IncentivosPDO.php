<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 07/05/2018
 * Time: 10:59
 */

namespace App\PDO\MySql\PortalEjecutivo;

use App\Entities\MySql\PortalEjecutivos\Incentivos;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class IncentivosPDO extends Model
{
    public static function obtenerBonoClientePorUsuario($in_usuario)
    {
        try {
            $sql = "SELECT * " // cantclinnuevopyme, cantclinnuevoge, tienebonoclientenuevo
                . " FROM incentivo "
                . " WHERE usuario = :usuario_filtro";

            $resultado = DB::connection('mysql_portalejecutivo')->select($sql, [
                'usuario_filtro' => $in_usuario
            ]);

            $arrayReturn = IncentivosPDO::returnIncentivosFormat($resultado);
            return $arrayReturn;
        }
        catch(\PDOException $excep) {
            return null;
        }
    }

    private static function returnIncentivosFormat($registros)
    {
        $arrayReturn = null;
        foreach ($registros as $registro) {
            $incentivo = new Incentivos();
            $incentivo->setId($registro->id);
            $incentivo->setRut($registro->rut);
            $incentivo->setUsuario($registro->usuario);
            $incentivo->setNombre($registro->nombre);
            $incentivo->setEstado($registro->estado);
            $incentivo->setGrupo($registro->grupo);
            $incentivo->setFechaingreso($registro->fechaingreso);
            $incentivo->setAntiguedad($registro->antiguedad);
            $incentivo->setMeta($registro->meta);
            $incentivo->setPromult2meses($registro->promult2meses);
            $incentivo->setPuesto($registro->puesto);
            $incentivo->setCantidadbono5000nuevo($registro->cantidadbono5000nuevo);
            $incentivo->setRutbono5000nuevo($registro->rutbono5000nuevo);
            $incentivo->setCantidadbono5000cross($registro->cantidadbono5000cross);
            $incentivo->setRutbono5000cross($registro->rutbono5000cross);
            $incentivo->setPorcentajebono100000hace2mes($registro->porcentajebono100000hace2mes);
            $incentivo->setPorcentajebono100000hace1mes($registro->porcentajebono100000hace1mes);
            $incentivo->setPorcentajebono100000estemes($registro->porcentajebono100000estemes);
            $incentivo->setVentacarteraactual($registro->ventacarteraactual);
            $incentivo->setPorcentajebono150000($registro->porcentajebono150000);
            $incentivo->setVentamesesanopasado($registro->ventamesesanopasado);
            $incentivo->setVentamesesanoactual($registro->ventamesesanoactual);
            $incentivo->setVentamesescarteraactual($registro->ventamesescarteraactual);
            $incentivo->setPromedioventaanoactual($registro->promedioventaanoactual);
            $incentivo->setFechahoracambio($registro->fechahoracambio);
            $incentivo->setMarzoanopasado($registro->marzoanopasado);
            $incentivo->setMarzoanoactualcartera($registro->marzoanoactualcartera);
            $incentivo->setCantclinnuevopyme($registro->cantclinnuevopyme);
            $incentivo->setCantclinnuevoge($registro->cantclinnuevoge);
            $incentivo->setRutclinuevopyme($registro->rutclinuevopyme);
            $incentivo->setRutclinuevoge($registro->rutclinuevoge);
            $incentivo->setDiciembreanopasado($registro->diciembreanopasado);
            $incentivo->setEneroactual($registro->eneroactual);
            $incentivo->setFebreroactual($registro->febreroactual);
            $incentivo->setTienebonoclientenuevo($registro->tienebonoclientenuevo);
            $incentivo->setTienebonocrecimiento($registro->tienebonocrecimiento);
            $incentivo->setMetamarzo($registro->metamarzo);
            $incentivo->setTotalpymenuevo($registro->totalpymenuevo);
            $incentivo->setTotalgenuevo($registro->totalgenuevo);
            $incentivo->setTodosrutpyme($registro->todosrutpyme);
            $incentivo->setTodosrutge($registro->todosrutge);
            $incentivo->setTodasrspyme($registro->todasrspyme);
            $incentivo->setTodasrsge($registro->todasrsge);
            $incentivo->setTodasventapyme($registro->todasventapyme);
            $incentivo->setTodasventage($registro->todasventage);
            $incentivo->setCumplimientopyme($registro->cumplimientopyme);
            $incentivo->setCumplimientoge($registro->cumplimientoge);
            $incentivo->setRutrelacionadopyme($registro->rutrelacionadopyme);
            $incentivo->setRutrelacionadoge($registro->rutrelacionadoge);
            $incentivo->setTotalotro($registro->totalotro);
            $arrayReturn[] = $incentivo;
        }

        return $arrayReturn;
    }
}
