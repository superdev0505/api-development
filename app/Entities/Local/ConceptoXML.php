<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-02-2018
 * Time: 10:27
 */

namespace App\Entities\Local;

class ConceptoXML
{
    private $ppva_grco_id;
    private $ppva_cova_id;
    private $ppva_valor;

    public function __construct()
    {

    }

    public function getPpvaGrcoId()
    {
        return $this->ppva_grco_id;
    }

    public function setPpvaGrcoId($ppva_grco_id)
    {
        $this->ppva_grco_id = $ppva_grco_id;
    }

    public function getPpvaCovaId()
    {
        return $this->ppva_cova_id;
    }

    public function setPpvaCovaId($ppva_cova_id)
    {
        $this->ppva_cova_id = $ppva_cova_id;
    }

    public function getPpvaValor()
    {
        return $this->ppva_valor;
    }

    public function setPpvaValor($ppva_valor)
    {
        $this->ppva_valor = $ppva_valor;
    }
}
