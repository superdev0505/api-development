<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 22/03/2018
 * Time: 10:29
 */

namespace App\PDO\MySql\Dimerc;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class CustomersPDO extends Model
{
    public static function getCustomCustomersByDates(Carbon $in_fechadesde, Carbon $in_fechahasta)
    {
        // Traer todos los datos desde MySQL
        $sql = "SELECT "
            . " a.entity_id, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 171) as rut_empresa, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id  = a.entity_type_id AND attribute_id = 170) as razon_social, "
            . " a.email, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 5) as nombre, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 7) as apellido, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 175) as telefono, "
            . " (SELECT value FROM customer_address_entity_text c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 24) direccion, "
            . " (SELECT value FROM customer_address_entity_varchar c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 25) comuna, "
            . " (SELECT value FROM customer_address_entity_varchar c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 27) region, "
            . " DATE_FORMAT(a.created_at,'%Y-%m-%d') fecha_creacion, "
            . " (SELECT `value` FROM eav_attribute_option_value WHERE option_id = (SELECT `value` FROM customer_entity_int x WHERE x.entity_id = a.entity_id AND attribute_id = 1898)) oracle_group,"
            . " (SELECT min(DATE_FORMAT(d.created_at,'%Y-%m-%d')) FROM sales_flat_order d WHERE d.customer_id = a.entity_id) fecha_primera_compra "
            . " FROM customer_entity a "
            . " WHERE (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 171) IS NOT NULL"
            . " AND a.created_at BETWEEN STR_TO_DATE(:fecha_desde, '%d-%m-%Y') AND STR_TO_DATE(:fecha_hasta, '%d-%m-%Y') + INTERVAL 1 DAY";

        $resultado = DB::connection('mysqlmagento_dimerc')->select($sql, [
            'fecha_desde' => $in_fechadesde->format('d-m-Y'),
            'fecha_hasta' => $in_fechahasta->format('d-m-Y')
        ]);

        $arrayReturn = array();
        foreach ($resultado as $registro) {
            // Si es que viene la primera fecha de compra, traer datos de la compra
            $monto_primera_compra = null;
            if ($registro->fecha_primera_compra) {
                $sql2 = "SELECT base_subtotal FROM sales_flat_order WHERE customer_id = :id_cliente AND DATE_FORMAT(created_at,'%Y-%m-%d') = :fecha_primera_compra;";
                $resultado2 = DB::connection('mysqlmagento_dimerc')->select($sql2, [
                    'id_cliente' => $registro->entity_id,
                    'fecha_primera_compra' => $registro->fecha_primera_compra
                ]);
                if (count($resultado2) > 0) {
                    $monto_primera_compra = $resultado2[0]->base_subtotal;
                }
            }

            $arrayReturn[] = array(
                'rut_empresa' => $registro->rut_empresa,
                'razon_social' => $registro->razon_social,
                'mail' => $registro->email,
                'nombre' => $registro->nombre,
                'apellido' => $registro->apellido,
                'telefono' => $registro->telefono,
                'direccion' => $registro->direccion,
                'comuna' => $registro->comuna,
                'region' => $registro->region,
                'fecha_creacion' => $registro->fecha_creacion,
                'primera_compra_fecha' => $registro->fecha_primera_compra,
                'primera_compra_monto' => $monto_primera_compra,
                'grupo' => $registro->oracle_group
            );
        }

        return $arrayReturn;
    }

    public static function getCustomCustomersByDate(Carbon $in_fecha)
    {
        // Traer todos los datos desde MySQL
        $sql = "SELECT "
            . " a.entity_id, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 171) as rut_empresa, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id  = a.entity_type_id AND attribute_id = 170) as razon_social, "
            . " a.email, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 5) as nombre, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 7) as apellido, "
            . " (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 175) as telefono, "
            . " (SELECT value FROM customer_address_entity_text c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 24) direccion, "
            . " (SELECT value FROM customer_address_entity_varchar c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 25) comuna, "
            . " (SELECT value FROM customer_address_entity_varchar c WHERE c.entity_id = (SELECT value FROM customer_entity_int b WHERE b.entity_id = a.entity_id AND b.attribute_id = 13) AND attribute_id = 27) region, "
            . " DATE_FORMAT(a.created_at,'%Y-%m-%d') fecha_creacion, "
            . " (SELECT `value` FROM eav_attribute_option_value WHERE option_id = (SELECT `value` FROM customer_entity_int x WHERE x.entity_id = a.entity_id AND attribute_id = 1898)) oracle_group,"
            . " (SELECT min(DATE_FORMAT(d.created_at,'%Y-%m-%d')) FROM sales_flat_order d WHERE d.customer_id = a.entity_id) fecha_primera_compra "
            . " FROM customer_entity a "
            . " WHERE (SELECT value FROM customer_entity_varchar WHERE entity_id = a.entity_id AND entity_type_id = a.entity_type_id AND attribute_id = 171) IS NOT NULL"
            . " AND date(a.created_at) = STR_TO_DATE(:fecha_filtro, '%d-%m-%Y')";

        $resultado = DB::connection('mysqlmagento_dimerc')->select($sql, [
            'fecha_filtro' => $in_fecha->format('d-m-Y')
        ]);

        $arrayReturn = array();
        foreach ($resultado as $registro) {
            // Si es que viene la primera fecha de compra, traer datos de la compra
            $monto_primera_compra = null;
            if ($registro->fecha_primera_compra) {
                $sql2 = "SELECT base_subtotal FROM sales_flat_order WHERE customer_id = :id_cliente AND DATE_FORMAT(created_at,'%Y-%m-%d') = :fecha_primera_compra;";
                $resultado2 = DB::connection('mysqlmagento_dimerc')->select($sql2, [
                    'id_cliente' => $registro->entity_id,
                    'fecha_primera_compra' => $registro->fecha_primera_compra
                ]);
                if (count($resultado2) > 0) {
                    $monto_primera_compra = $resultado2[0]->base_subtotal;
                }
            }

            $arrayReturn[] = array(
                'rut_empresa' => $registro->rut_empresa,
                'razon_social' => $registro->razon_social,
                'mail' => $registro->email,
                'nombre' => $registro->nombre,
                'apellido' => $registro->apellido,
                'telefono' => $registro->telefono,
                'direccion' => $registro->direccion,
                'comuna' => $registro->comuna,
                'region' => $registro->region,
                'fecha_creacion' => $registro->fecha_creacion,
                'primera_compra_fecha' => $registro->fecha_primera_compra,
                'primera_compra_monto' => $monto_primera_compra,
                'grupo' => $registro->oracle_group
            );
        }

        return $arrayReturn;
    }
}