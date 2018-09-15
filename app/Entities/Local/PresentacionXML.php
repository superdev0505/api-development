<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-02-2018
 * Time: 10:23
 */

namespace App\Entities\Local;

class PresentacionXML {

    private $prpr_unid_id;
    private $prpr_prop_id;
    private $prpr_descrip;
    private $prpr_largo;
    private $prpr_ancho;
    private $prpr_alto;
    private $prpr_peso;

    public function __construct() {
        
    }

    public function getPrprUnidId() {
        return $this->prpr_unid_id;
    }

    public function setPrprUnidId($prpr_unid_id) {
        $this->prpr_unid_id = $prpr_unid_id;
    }

    public function getPrprPropId() {
        return $this->prpr_prop_id;
    }

    public function setPrprPropId($prpr_prop_id) {
        $this->prpr_prop_id = $prpr_prop_id;
    }

    public function getPrprDescrip() {
        return substr($this->prpr_descrip, 0, 30);
    }

    public function setPrprDescrip($prpr_descrip) {
        $this->prpr_descrip = $prpr_descrip;
    }

    public function getPrprLargo() {
        return $this->prpr_largo;
    }

    public function setPrprLargo($prpr_largo) {
        $this->prpr_largo = $prpr_largo;
    }

    public function getPrprAncho() {
        return $this->prpr_ancho;
    }

    public function setPrprAncho($prpr_ancho) {
        $this->prpr_ancho = $prpr_ancho;
    }

    public function getPrprAlto() {
        return $this->prpr_alto;
    }

    public function setPrprAlto($prpr_alto) {
        $this->prpr_alto = $prpr_alto;
    }

    public function getPrprPeso() {
        return $this->prpr_peso;
    }

    public function setPrprPeso($prpr_peso) {
        $this->prpr_peso = $prpr_peso;
    }

}
