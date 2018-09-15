<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 06/03/2018
 * Time: 15:05
 */

namespace App\Http\Controllers\Api\Masivo;

use App\Entities\MySql\Cerberus\LogOfertasEspeciales;
use App\Entities\Oracle\DMVentas\EnClienteCosto;
use App\Http\Controllers\Controller;
use App\PDO\MySql\Cerberus\LgOfertasEspecialesPDO;
use App\PDO\Oracle\DMVentas\EnClienteCostoPDO;
use Illuminate\Http\Request;
use App\PDO\Lib\ResponseFormatt;
use Carbon\Carbon;

class OfertasController extends Controller
{
    public function validaExcelMasivo(Request $request)
    {
        $responseFormatt = new ResponseFormatt();
        $registros = $request['datosExcelJson'];
        $contador = -1;
        if (count($registros)) {
            foreach ($registros as $registro) {
                $contador++;
                // 1.- Validar si ya viene con problemas
                if ($registro['validacionLocal'] != 1) {
                    $registros[$contador]['validacionRemota'] = 0;
                    continue;
                }

                // 2.- Validar que NO exista una oferta
                $codigo_producto = $registro['codigo_producto'];
                $fecha_inicio = Carbon::createFromFormat('d/m/Y', $registro['fecha_inicio_format']);
                $fecha_termino = Carbon::createFromFormat('d/m/Y', $registro['fecha_termino_format']);;

                if (EnClienteCostoPDO::existeOfertaPorRangoFecha($codigo_producto, $fecha_inicio, $fecha_termino)) {
                    $registros[$contador]['validacionRemotaIcon'] = "Ya existe una oferta pública para el producto [" . $codigo_producto . "] con este rango de fechas.";
                    $registros[$contador]['validacionRemota'] = 0;
                    continue;
                }

                // Al pasar todas las validaciones, el usuario está OK
                $registros[$contador]['validacionRemotaIcon'] = 'OK';
                $registros[$contador]['validacionRemota'] = 1;
            }

            return response()->json($registros);
        } else {

            $responseFormatt
                ->setCode(201)
                ->setResponse("No se pudo validar la información");
            return $responseFormatt->returnToJson();
        }
    }

    public function ingresaExcelMasivo($apikey_usuario, Request $request)
    {
        $responseFormatt = new ResponseFormatt();
        $registros = $request['datosTabla'];
        $contador = 0;
        $contador_ok = 0;
        $contador_error = 0;
        if ($registros) {
            foreach ($registros as $registro) {
                try {
                    // 1.- Validar si ya viene con problemas
                    if ($registro['validacionLocal'] != 1 || $registro['validacionRemota'] != 1) {
                        $contador_error++;
                        continue;
                    }

                    // 2.- Obtener el último [id_numero] de la tabla [en_cliente_costo]
                    $nuevoId = EnClienteCostoPDO::getNuevoIdNumero();
                    if (!$nuevoId) {
                        $contador_error++;
                        continue;
                    }

                    // INGRESAR DATOS
                    $fecha_inicio = Carbon::createFromFormat('d/m/Y', $registro['fecha_inicio_format']);
                    $fecha_termino = Carbon::createFromFormat('d/m/Y', $registro['fecha_termino_format']);;

                    $nuevaPromocion = new EnClienteCosto();
                    $nuevaPromocion->setIdNumero($nuevoId);
                    $nuevaPromocion->setFecini($fecha_inicio->format('d/m/Y'));
                    $nuevaPromocion->setFecfin($fecha_termino->format('d/m/Y'));
                    $nuevaPromocion->setCodpro($registro['codigo_producto']);
                    $nuevaPromocion->setPrecio($registro['precio_venta']);
                    $nuevaPromocion->setCosto($registro['costo_producto']);
                    $nuevaPromocion->setMargen(round($registro['margen']));

                    if (EnClienteCostoPDO::insertNuevaOferta($nuevaPromocion)) {
                        $contador_ok++;

                        // Loguear ingreso de archivos
                        $logNuevaPromocion = new LogOfertasEspeciales();
                        $logNuevaPromocion->setPrecio($nuevaPromocion->getPrecio());
                        $logNuevaPromocion->setCosto($nuevaPromocion->getCosto());
                        $logNuevaPromocion->setFechaInicio($fecha_inicio->format('Y/m/d'));
                        $logNuevaPromocion->setFechaTermino($fecha_termino->format('Y/m/d'));
                        $logNuevaPromocion->setMargen($nuevaPromocion->getMargen());
                        $logNuevaPromocion->setCodigoProducto($nuevaPromocion->getCodpro());
                        $logNuevaPromocion->setCodigoEmp($nuevaPromocion->getCodemp());
                        $logNuevaPromocion->setCodigoMon($nuevaPromocion->getCodmon());
                        $logNuevaPromocion->setTipo($nuevaPromocion->getTipo());
                        $logNuevaPromocion->setIdNumero($nuevaPromocion->getIdNumero());
                        $logNuevaPromocion->setAccion('INSERT');
                        $logNuevaPromocion->setRutCliente(1);
                        $logNuevaPromocion->setCantidad(0);
                        $logNuevaPromocion->setUsrCreacByApiKey($apikey_usuario);
                        LgOfertasEspecialesPDO::ingresarOfertaEspecial($logNuevaPromocion);
                    } else {
                        $contador_error++;
                    }
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $contador_error++;
                } finally {
                    // 6.- Contador
                    $contador++;
                }
            }

            $responseFormatt
                ->setCode(200)
                ->setResponse("Ofertas publicadas exitosamente [" . $contador_ok . " Correcto(s) | " . $contador_error . " Error(es) de " . $contador . "].");
            return $responseFormatt->returnToJson();
        } else {
            $responseFormatt
                ->setCode(201)
                ->setResponse("No se pudo ingresar nada de información.");
            return $responseFormatt->returnToJson();
        }
    }
}