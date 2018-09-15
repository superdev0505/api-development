<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-02-2018
 * Time: 10:26
 */

namespace App\Entities\Local;

class OrganizacionXML
{
    private $pror_orga_id;
    private $pror_unid_id;
    private $pror_descrip;
    private $pror_descrip_corta;
    private $pror_codigo;

    public function __construct()
    {

    }

    public function getProrOrgaId()
    {
        return $this->pror_orga_id;
    }

    public function setProrOrgaId($pror_orga_id)
    {
        $this->pror_orga_id = $pror_orga_id;
    }

    public function getProrUnidId()
    {
        return $this->pror_unid_id;
    }

    public function setProrUnidId($pror_unid_id)
    {
        $this->pror_unid_id = $pror_unid_id;
    }

    public function getProrDescrip()
    {
        return $this->pror_descrip;
    }

    public function setProrDescrip($pror_descrip)
    {
        $this->pror_descrip = $pror_descrip;
    }

    public function getProrDescripCorta()
    {
        return $this->pror_descrip_corta;
    }

    public function setProrDescripCorta($pror_descrip_corta)
    {
        $this->pror_descrip_corta = $pror_descrip_corta;
    }

    public function getProrCodigo()
    {
        return $this->pror_codigo;
    }

    public function setProrCodigo($pror_codigo)
    {
        $this->pror_codigo = $pror_codigo;
    }
}
