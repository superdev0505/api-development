<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 27/03/2018
 * Time: 8:21
 */

namespace App\Helpers\Publicas;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Publicas\PublicController;

class PublicasHelper extends GeneralHelper
{
    public function transformarProductosFFaGRFinal($in_fecha = null)
    {
        if ($error = $this->validaFecha($in_fecha)) {
            return $error;
        }

        // 2.- IR A CONTROLADOR
        $controlador = new PublicController();
        // return $controlador->transformarProductosFFaGG($this->fechadesde);
        return $controlador->transformarProductosFFaGRFinal($this->fechadesde);
    }

    public function transformarRestoFFaGG($in_fecha = null)
    {
        if ($error = $this->validaFecha($in_fecha)) {
            return $error;
        }

        // 2.- IR A CONTROLADOR
        $controlador = new PublicController();
        return $controlador->transformarRestoFFaGG($this->fechadesde);
    }

    public function transformarSKUNormalGrainger($in_fecha = null)
    {
        if ($error = $this->validaFecha($in_fecha)) {
            return $error;
        }

        // 2.- IR A CONTROLADOR
        $controlador = new PublicController();
        return $controlador->transformarSKUNormalGrainger($this->fechadesde);
    }
}