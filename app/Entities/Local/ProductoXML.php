<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13-02-2018
 * Time: 10:21
 */

namespace App\Entities\Local;

class ProductoXML
{

    private $prod_id;
    private $prod_grup_id;
    private $prod_marc_id;
    private $prod_pres_id;
    private $prod_descrip;
    private $prod_fecha_inicio;
    private $prod_fecha_termino;
    private $prod_descrip_corta;
    private $prod_descrip_completa;
    private $prod_marca_propia;
    private $prod_importado;
    private $presentaciones;
    private $organizaciones;
    private $conceptos;
    private $xml_file_name;

    public function __construct()
    {
        $this->presentaciones = [];
        $this->organizaciones = [];
        $this->conceptos = [];
    }

    public static function getFileName($rut_proveedor, $codigo_proveedor)
    {
        $in_codigoproducto = "FF_" . $codigo_proveedor . "_" . $rut_proveedor;;
        $filename = preg_replace('/[^A-Za-z0-9\-_]/', '', $in_codigoproducto);
        $filename = stripslashes($filename);
        $xml_name = $filename . ".xml";
    }

    public function getProdId()
    {
        return $this->prod_id;
    }

    public function setProdId($prod_id)
    {
        $this->prod_id = $prod_id;
    }

    public function getProdGrupId()
    {
        return $this->prod_grup_id;
    }

    public function setProdGrupId($prod_grup_id)
    {
        $this->prod_grup_id = $prod_grup_id;
    }

    public function getProdMarcId()
    {
        return $this->prod_marc_id;
    }

    public function setProdMarcId($prod_marc_id)
    {
        $this->prod_marc_id = $prod_marc_id;
    }

    public function getProdPresId()
    {
        return $this->prod_pres_id;
    }

    public function setProdPresId($prod_pres_id)
    {
        $this->prod_pres_id = $prod_pres_id;
    }

    public function getProdDescrip()
    {
        return $this->prod_descrip;
    }

    public function setProdDescrip($prod_descrip)
    {
        $this->prod_descrip = $prod_descrip;
    }

    public function getProdFechaInicio()
    {
        return $this->prod_fecha_inicio;
    }

    public function setProdFechaInicio($prod_fecha_inicio)
    {
        $this->prod_fecha_inicio = $prod_fecha_inicio;
    }

    public function getProdFechaTermino()
    {
        return $this->prod_fecha_termino;
    }

    public function setProdFechaTermino($prod_fecha_termino)
    {
        $this->prod_fecha_termino = $prod_fecha_termino;
    }

    public function getProdDescripCorta()
    {
        return $this->prod_descrip_corta;
    }

    public function setProdDescripCorta($prod_descrip_corta)
    {
        $this->prod_descrip_corta = $prod_descrip_corta;
    }

    public function getProdDescripCompleta()
    {
        return $this->prod_descrip_completa;
    }

    public function setProdDescripCompleta($prod_descrip_completa)
    {
        $this->prod_descrip_completa = $prod_descrip_completa;
    }

    public function getProdMarcaPropia()
    {
        return $this->prod_marca_propia;
    }

    public function setProdMarcaPropia($prod_marca_propia)
    {
        $this->prod_marca_propia = $prod_marca_propia;
    }

    public function getProdImportado()
    {
        return $this->prod_importado;
    }

    public function setProdImportado($prod_importado)
    {
        $this->prod_importado = $prod_importado;
    }

    /* Atributos especiales */

    public function getPresentaciones()
    {
        return $this->presentaciones;
    }

    public function getOrganizaciones()
    {
        return $this->organizaciones;
    }

    public function getConceptos()
    {
        return $this->conceptos;
    }

    public function setPresentacion(PresentacionXML $in_presentacion)
    {
        $this->presentaciones[] = $in_presentacion;
    }

    public function addPresentacion(PresentacionXML $in_presentacion)
    {
        array_push($this->presentaciones, $in_presentacion);
    }

    public function setOrganizacion(OrganizacionXML $in_organizacion)
    {
        $this->organizaciones[] = $in_organizacion;
    }

    public function addOrganizacion(OrganizacionXML $in_organizacion)
    {
        array_push($this->organizaciones, $in_organizacion);
    }

    public function setConcepto(ConceptoXML $in_concepto)
    {
        $this->conceptos[] = $in_concepto;
    }

    public function addConcepto(ConceptoXML $in_concepto)
    {
        array_push($this->conceptos, $in_concepto);
    }

    public function creacionXMLFinal($in_codigoproducto)
    {
        $xml_name = null;
        try {
            $xml = new \DOMDocument();
            $xml_product = $xml->createElement("PRODUCTO");
            $xml_product->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            $xml_product->setAttribute('xsi:noNamespaceSchemaLocation', 'http://www.translogic.cl/xml/2017/producto.xsd');

            $xml_PROD_ID = $xml->createElement("PROD_ID");
            $xml_PROD_ID->nodeValue = $this->getProdId();
            $xml_product->appendChild($xml_PROD_ID);

            $xml_PROD_GRUP_ID = $xml->createElement("PROD_GRUP_ID");
            $xml_PROD_GRUP_ID->nodeValue = $this->getProdGrupId();
            $xml_product->appendChild($xml_PROD_GRUP_ID);

            $xml_PROD_MARC_ID = $xml->createElement("PROD_MARC_ID");
            $xml_PROD_MARC_ID->nodeValue = $this->getProdMarcId();
            $xml_product->appendChild($xml_PROD_MARC_ID);

            $xml_PROD_PRES_ID = $xml->createElement("PROD_PRES_ID");
            $xml_PROD_PRES_ID->nodeValue = $this->getProdPresId();
            $xml_product->appendChild($xml_PROD_PRES_ID);

            $xml_PROD_DESCRIP = $xml->createElement("PROD_DESCRIP");

            $xml_PROD_DESCRIP->nodeValue = $this->getProdDescrip();
            $xml_product->appendChild($xml_PROD_DESCRIP);

            $xml_PROD_FECHA_INICIO = $xml->createElement("PROD_FECHA_INICIO");
            $xml_PROD_FECHA_INICIO->nodeValue = $this->getProdFechaInicio();
            $xml_product->appendChild($xml_PROD_FECHA_INICIO);

            $xml_PROD_FECHA_TERMINO = $xml->createElement("PROD_FECHA_TERMINO");
            $xml_PROD_FECHA_TERMINO->nodeValue = $this->getProdFechaTermino();
            $xml_product->appendChild($xml_PROD_FECHA_TERMINO);

            $xml_PROD_DESCRIP_CORTA = $xml->createElement("PROD_DESCRIP_CORTA");
            $xml_PROD_DESCRIP_CORTA->nodeValue = $this->getProdDescripCorta();
            $xml_product->appendChild($xml_PROD_DESCRIP_CORTA);

            $xml_PROD_DESCRIP_COMPLETA = $xml->createElement("PROD_DESCRIP_COMPLETA");
            $xml_PROD_DESCRIP_COMPLETA->nodeValue = $this->getProdDescripCompleta();
            $xml_product->appendChild($xml_PROD_DESCRIP_COMPLETA);

            $xml_PROD_MARCA_PROPIA = $xml->createElement("PROD_MARCA_PROPIA");
            $xml_PROD_MARCA_PROPIA->nodeValue = $this->getProdMarcaPropia();
            $xml_product->appendChild($xml_PROD_MARCA_PROPIA);

            $xml_PROD_IMPORTADO = $xml->createElement("PROD_IMPORTADO");
            $xml_PROD_IMPORTADO->nodeValue = $this->getProdImportado();
            $xml_product->appendChild($xml_PROD_IMPORTADO);
            //=============================================================================
            /*             * ************* PRESENTACIONES ******************* */
            if (count($this->getPresentaciones()) > 0) {
                $xml_PRESENTACIONES = $xml->createElement("PRESENTACIONES");
                $xml_product->appendChild($xml_PRESENTACIONES);
                foreach ($this->getPresentaciones() as $presentacion) {
                    // $presentacion = new PresentacionXML();
                    $xml_PRESENTACION = $xml->createElement("PRESENTACION");
                    $xml_PRESENTACIONES->appendChild($xml_PRESENTACION);

                    $xml_PRPR_UNID_ID = $xml->createElement("PRPR_UNID_ID");
                    $xml_PRPR_UNID_ID->nodeValue = $presentacion->getPrprUnidId();
                    $xml_PRESENTACION->appendChild($xml_PRPR_UNID_ID);

                    $xml_PRPR_PROP_ID = $xml->createElement("PRPR_PROP_ID");
                    $xml_PRPR_PROP_ID->nodeValue = $presentacion->getPrprPropId();
                    $xml_PRESENTACION->appendChild($xml_PRPR_PROP_ID);

                    $xml_PRPR_DESCRIP = $xml->createElement("PRPR_DESCRIP");
                    $xml_PRPR_DESCRIP->nodeValue = $presentacion->getPrprDescrip();
                    $xml_PRESENTACION->appendChild($xml_PRPR_DESCRIP);

                    $xml_PRPR_LARGO = $xml->createElement("PRPR_LARGO");
                    $xml_PRPR_LARGO->nodeValue = $presentacion->getPrprLargo();
                    $xml_PRESENTACION->appendChild($xml_PRPR_LARGO);

                    $xml_PRPR_ANCHO = $xml->createElement("PRPR_ANCHO");
                    $xml_PRPR_ANCHO->nodeValue = $presentacion->getPrprAncho();
                    $xml_PRESENTACION->appendChild($xml_PRPR_ANCHO);

                    $xml_PRPR_ALTO = $xml->createElement("PRPR_ALTO");
                    $xml_PRPR_ALTO->nodeValue = $presentacion->getPrprAlto();
                    $xml_PRESENTACION->appendChild($xml_PRPR_ALTO);

                    $xml_PRPR_PESO = $xml->createElement("PRPR_PESO");
                    $xml_PRPR_PESO->nodeValue = $presentacion->getPrprPeso();
                    $xml_PRESENTACION->appendChild($xml_PRPR_PESO);
                }
            }


            /*             * ************* ORGANIZACIONES *********************** */
            if (count($this->getOrganizaciones()) > 0) {
                $xml_ORGANIZACIONES = $xml->createElement("ORGANIZACIONES");
                $xml_product->appendChild($xml_ORGANIZACIONES);
                foreach ($this->getOrganizaciones() as $organizacion) {
                    // $organizacion = new OrganizacionXML();
                    $xml_ORGANIZACION = $xml->createElement("ORGANIZACION");
                    $xml_ORGANIZACIONES->appendChild($xml_ORGANIZACION);

                    $xml_PROR_ORGA_ID = $xml->createElement("PROR_ORGA_ID");
                    $xml_PROR_ORGA_ID->nodeValue = $organizacion->getProrOrgaId();
                    $xml_ORGANIZACION->appendChild($xml_PROR_ORGA_ID);

                    $xml_PROR_UNID_ID = $xml->createElement("PROR_UNID_ID");
                    $xml_PROR_UNID_ID->nodeValue = $organizacion->getProrUnidId();
                    $xml_ORGANIZACION->appendChild($xml_PROR_UNID_ID);

                    $xml_PROR_DESCRIP = $xml->createElement("PROR_DESCRIP");
                    $xml_PROR_DESCRIP->nodeValue = $organizacion->getProrDescrip();
                    $xml_ORGANIZACION->appendChild($xml_PROR_DESCRIP);

                    $xml_PROR_DESCRIP_CORTA = $xml->createElement("PROR_DESCRIP_CORTA");
                    $xml_PROR_DESCRIP_CORTA->nodeValue = $organizacion->getProrDescripCorta();
                    $xml_ORGANIZACION->appendChild($xml_PROR_DESCRIP_CORTA);

                    $xml_PROR_CODIGO = $xml->createElement("PROR_CODIGO");
                    $xml_PROR_CODIGO->nodeValue = $organizacion->getProrCodigo();
                    $xml_ORGANIZACION->appendChild($xml_PROR_CODIGO);
                }

            }

            /*             * ***************** CONCEPTOS ********************* */
            if (count($this->getConceptos()) > 0) {
                $xml_CONCEPTOS = $xml->createElement("CONCEPTOS");
                $xml_product->appendChild($xml_CONCEPTOS);
                foreach ($this->getConceptos() as $concepto) {
                    // $concepto = new ConceptoXML();
                    $xml_CONCEPTO = $xml->createElement("CONCEPTO");
                    $xml_CONCEPTOS->appendChild($xml_CONCEPTO);

                    $xml_PPVA_GRCO_ID = $xml->createElement("PPVA_GRCO_ID");
                    $xml_PPVA_GRCO_ID->nodeValue = $concepto->getPpvaGrcoId();
                    $xml_CONCEPTO->appendChild($xml_PPVA_GRCO_ID);

                    $xml_PPVA_COVA_ID = $xml->createElement("PPVA_COVA_ID");
                    $xml_PPVA_COVA_ID->nodeValue = $concepto->getPpvaCovaId();
                    $xml_CONCEPTO->appendChild($xml_PPVA_COVA_ID);

                    $xml_PPVA_VALOR = $xml->createElement("PPVA_VALOR");
                    $xml_PPVA_VALOR->nodeValue = $concepto->getPpvaValor();
                    $xml_CONCEPTO->appendChild($xml_PPVA_VALOR);
                }
            }


            $xml->appendChild($xml_product);
            $xml->formatOutput = true;
            $filename = $in_codigoproducto;
            $filename = preg_replace('/[^A-Za-z0-9\-_]/', '', $filename);
            $filename = stripslashes($filename);
            $xml_name = $filename . ".xml";
            $xml_storage_path = env('STORAGE_XML_FILES') . DIRECTORY_SEPARATOR . $xml_name;
            $xml_internal_file_path = storage_path($xml_storage_path);
            $xml->save($xml_internal_file_path);
        } catch (\Exception $e) {
            return null;
        }
        return $xml_name;
    }
}