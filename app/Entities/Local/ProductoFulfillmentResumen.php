<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 13/03/2018
 * Time: 11:29
 */

namespace App\Entities\Local;

class ProductoFulfillmentResumen implements \JsonSerializable
{
    private $codigo_producto;
    private $codigo_unificado;
    private $nombre_producto;
    private $nombre_producto_descripcion;
    private $xml_nombrearchivo;
    private $margen;
    private $codigo_proveedor;

    private $unidad_embalaje;
    private $unidad_subembalaje;

    private $embalaje_peso;
    private $embalaje_alto;
    private $embalaje_ancho;
    private $embalaje_fondo;

    private $subembalaje_peso;
    private $subembalaje_alto;
    private $subembalaje_ancho;
    private $subembalaje_fondo;

    private $codigo_barra;
    private $codigo_barra_ean13;
    private $codigo_barra_dun14;

    public function __construct()
    {

    }

    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    public function setCodigoProducto($codigo_producto)
    {
        $this->codigo_producto = $codigo_producto;
    }

    public function getCodigoUnificado()
    {
        return $this->codigo_unificado;
    }

    public function setCodigoUnificado($codigo_unificado)
    {
        $this->codigo_unificado = $codigo_unificado;
    }

    public function getNombreProducto()
    {
        return $this->nombre_producto;
    }

    public function setNombreProducto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }

    public function getNombreProductoDescripcion()
    {
        return $this->nombre_producto_descripcion;
    }

    public function setNombreProductoDescripcion($nombre_producto_descripcion)
    {
        $this->nombre_producto_descripcion = $nombre_producto_descripcion;
    }

    public function getCodigoBarra()
    {
        return $this->codigo_barra;
    }

    public function setCodigoBarra($codigo_barra)
    {
        $this->codigo_barra = $codigo_barra;
    }

    public function getXmlNombrearchivo()
    {
        return $this->xml_nombrearchivo;
    }

    public function setXmlNombrearchivo($xml_nombrearchivo)
    {
        $this->xml_nombrearchivo = $xml_nombrearchivo;
    }


    public function getMargen()
    {
        return $this->margen;
    }

    public function setMargen($margen)
    {
        $this->margen = $margen;
    }


    public function getCodigoProveedor()
    {
        return $this->codigo_proveedor;
    }

    public function setCodigoProveedor($codigo_proveedor)
    {
        $this->codigo_proveedor = $codigo_proveedor;
    }

    public function getUnidadEmbalaje()
    {
        return $this->unidad_embalaje;
    }

    public function setUnidadEmbalaje($unidad_embalaje)
    {
        $this->unidad_embalaje = $unidad_embalaje;
    }

    public function getUnidadSubembalaje()
    {
        return $this->unidad_subembalaje;
    }

    public function setUnidadSubembalaje($unidad_subembalaje)
    {
        $this->unidad_subembalaje = $unidad_subembalaje;
    }

    public function getEmbalajePeso()
    {
        return $this->embalaje_peso;
    }

    public function setEmbalajePeso($embalaje_peso)
    {
        $this->embalaje_peso = $embalaje_peso;
    }

    public function getEmbalajeAlto()
    {
        return $this->embalaje_alto;
    }

    public function setEmbalajeAlto($embalaje_alto)
    {
        $this->embalaje_alto = $embalaje_alto;
    }

    public function getEmbalajeAncho()
    {
        return $this->embalaje_ancho;
    }

    public function setEmbalajeAncho($embalaje_ancho)
    {
        $this->embalaje_ancho = $embalaje_ancho;
    }

    public function getEmbalajeFondo()
    {
        return $this->embalaje_fondo;
    }

    public function setEmbalajeFondo($embalaje_fondo)
    {
        $this->embalaje_fondo = $embalaje_fondo;
    }

    public function getSubembalajePeso()
    {
        return $this->subembalaje_peso;
    }

    public function setSubembalajePeso($subembalaje_peso)
    {
        $this->subembalaje_peso = $subembalaje_peso;
    }

    public function getSubembalajeAlto()
    {
        return $this->subembalaje_alto;
    }

    public function setSubembalajeAlto($subembalaje_alto)
    {
        $this->subembalaje_alto = $subembalaje_alto;
    }

    public function getSubembalajeAncho()
    {
        return $this->subembalaje_ancho;
    }

    public function setSubembalajeAncho($subembalaje_ancho)
    {
        $this->subembalaje_ancho = $subembalaje_ancho;
    }

    public function getSubembalajeFondo()
    {
        return $this->subembalaje_fondo;
    }

    public function setSubembalajeFondo($subembalaje_fondo)
    {
        $this->subembalaje_fondo = $subembalaje_fondo;
    }

    public function getCodigoBarraEan13()
    {
        return $this->codigo_barra_ean13;
    }

    public function setCodigoBarraEan13($codigo_barra_ean13)
    {
        $this->codigo_barra_ean13 = $codigo_barra_ean13;
    }

    public function getCodigoBarraDun14()
    {
        return $this->codigo_barra_dun14;
    }

    public function setCodigoBarraDun14($codigo_barra_dun14)
    {
        $this->codigo_barra_dun14 = $codigo_barra_dun14;
    }

    public function jsonSerialize() {
        return [
            'codigo_sku' => $this->getCodigoProducto(),
            'codigo_unificado' => $this->getCodigoUnificado(),
            'codigo_barra' => $this->getCodigoBarra(),
            'codigo_barra_ean13' => $this->getCodigoBarraEan13(),
            'codigo_barra_dun14' => $this->getCodigoBarraDun14(),
            'producto_nombre' => $this->getNombreProducto(),
            'producto_descripcion' => $this->getNombreProductoDescripcion(),
            'margen' => $this->getMargen(),
            'codigo_proveedor' => $this->getCodigoProveedor(),
            'embalaje_alto' => $this->getEmbalajeAlto(),
            'embalaje_fondo' => $this->getEmbalajeFondo(),
            'embalaje_ancho' => $this->getEmbalajeAncho(),
            'embalaje_peso' => $this->getEmbalajePeso(),
            'subembalaje_alto' => $this->getSubembalajeAlto(),
            'subembalaje_fondo' => $this->getSubembalajeFondo(),
            'subembalaje_ancho' => $this->getSubembalajeAncho(),
            'subembalaje_peso' => $this->getSubembalajePeso(),
            'unidad_embalaje' => $this->getUnidadEmbalaje(),
            'unidad_subembalaje' => $this->getUnidadSubembalaje(),
        ];
    }
}