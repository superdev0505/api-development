<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24-01-2018
 * Time: 16:07
 */

namespace App\Http\Controllers\Api\Validar;

use App\Http\Controllers\Controller;
use App\PDO\Lib\ResponseFormatt;
use Illuminate\Support\Facades\Storage;
use DateTime;
use XML;

class ValidarController extends Controller
{
    private function checkReferencia($data)
    {
        if (!isset($data->SetDTE->DTE->Documento->Referencia)) return false;
        $i = 0;
        $cnt = 0;
        foreach ($data->SetDTE->DTE->Documento->Referencia as $key => $element) {
            if ($element->TpoDocRef != 801) {
                unset($data->Documento[$i]);
            } else if ($element->TpoDocRef == 801) {
                $cnt++;
            }
            $i++;
        }
        return ($cnt == 0) ? false : $data;
    }

    private function checkformacion($data)
    {
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->IdDoc->Folio)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->IdDoc->FchEmis)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Referencia->FolioRef)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->RUTEmisor)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->RznSoc)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->GiroEmis)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->DirOrigen)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->CmnaOrigen)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Emisor->CiudadOrigen)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Receptor->RUTRecep)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Totales->MntNeto)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Totales->TasaIVA)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Totales->IVA)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->Totales->MntTotal)) return false;
        if (!isset($data->SetDTE->DTE->Documento->Encabezado->IdDoc->TipoDTE)) return false;

        return true;
    }

    private function xml_join($root, $append)
    {
        if ($append) {
            if (strlen(trim((string)$append)) == 0) {
                $xml = $root->addChild($append->getName());
                foreach ($append->children() as $child) {
                    $this->xml_join($xml, $child);
                }
            } else {
                $xml = $root->addChild($append->getName(), (string)$append);
            }
            foreach ($append->attributes() as $n => $v) {
                $xml->addAttribute($n, $v);
            }
        }
    }

    public function validateXML($xml_file)
    {
        // 1.- Obtener registros
        $path = 'xml_vendor/';
        $original_path = 'xml_vendor/transformados';
        $error_transform_path = 'xml_vendor/error/';
        $error_formato_path = 'xml_vendor/error_folio/';
        $xml_object = Storage::disk('ftp')->get($path . $xml_file);
        $parsed_xml = simplexml_load_string($xml_object);
        $data = null;
        if (isset($parsed_xml->SetDTE->DTE)) {
            $data = $parsed_xml;
        } else if (isset($parsed_xml->Documento)) {
            $data = new \SimpleXMLElement('<EnvioDTE><SetDTE></SetDTE></EnvioDTE>');
            $this->xml_join($data->children(), $parsed_xml);
            //$data = $parsed_xml;
        } else {
            Storage::disk('ftp')->put($error_formato_path . $xml_file, $xml_object);
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(203)
                ->setResponse("Error de formación de archivo.");
            return $responseFormatt->returnToJson();
        }

        $data = $this->checkReferencia($data);
        if ($data == false) {
            Storage::disk('ftp')->put($error_transform_path . $xml_file, $xml_object);
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(204)
                ->setResponse("No se encontraron todas las etiquetas especificadas");
            return $responseFormatt->returnToJson();
        }
        if ($this->checkformacion($data)) {
            $folio = $data->SetDTE->DTE->Documento->Encabezado->IdDoc->Folio;
            $fchemis = $data->SetDTE->DTE->Documento->Encabezado->IdDoc->FchEmis;
            $folioref = $data->SetDTE->DTE->Documento->Referencia->FolioRef;
            $rutemisor = $data->SetDTE->DTE->Documento->Encabezado->Emisor->RUTEmisor;
            $rznsoc = $data->SetDTE->DTE->Documento->Encabezado->Emisor->RznSoc;
            $giroemis = $data->SetDTE->DTE->Documento->Encabezado->Emisor->GiroEmis;
            $dirorigen = $data->SetDTE->DTE->Documento->Encabezado->Emisor->DirOrigen;
            $cmnaorigen = $data->SetDTE->DTE->Documento->Encabezado->Emisor->CmnaOrigen;
            $ciudadorigen = $data->SetDTE->DTE->Documento->Encabezado->Emisor->CiudadOrigen;
            $rutrecep = $data->SetDTE->DTE->Documento->Encabezado->Receptor->RUTRecep;
            $mntneto = $data->SetDTE->DTE->Documento->Encabezado->Totales->MntNeto;
            $tasaiva = $data->SetDTE->DTE->Documento->Encabezado->Totales->TasaIVA;
            $iva = $data->SetDTE->DTE->Documento->Encabezado->Totales->IVA;
            $mnttotal = $data->SetDTE->DTE->Documento->Encabezado->Totales->MntTotal;
            $tipodte = $data->SetDTE->DTE->Documento->Encabezado->IdDoc->TipoDTE;

            $int_folio = round($folio);
            $int_mntneto = round($mntneto);
            $int_tasaiva = round($tasaiva);
            $int_iva = round($iva);
            $int_mnttotal = round($mnttotal);
            $int_tipodte = round($tipodte);
            $date_fchemis = new DateTime($fchemis);
            $formated = date_format($date_fchemis, 'd-m-Y');

            $data->SetDTE->DTE->Documento->Encabezado->IdDoc->Folio = $int_folio;
            $data->SetDTE->DTE->Documento->Encabezado->Totales->Mntneto = $int_mntneto;
            $data->SetDTE->DTE->Documento->Encabezado->Totales->TasaIVA = $int_tasaiva;
            $data->SetDTE->DTE->Documento->Encabezado->Totales->IVA = $int_iva;
            $data->SetDTE->DTE->Documento->Encabezado->Totales->MntTotal = $int_mnttotal;
            $data->SetDTE->DTE->Documento->Encabezado->IdDoc->TipoDTE = $int_tipodte;

            $data->SetDTE->DTE->Documento->Encabezado->IdDoc->FchEmis = $formated;


            $doc = new \DOMDocument();
            $doc->formatOutput = TRUE;
            $doc->loadXML($data->asXML());
            $xml = $doc->saveXML();

            // 2.- Verificar que no venga vacío los registros, o que halla problema de conexión
            Storage::disk('ftp')->put($original_path . $xml_file, $xml);
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(200)
                ->setResponse("Completado con éxito.");

            return $responseFormatt->returnToJson();
        } else {
            Storage::disk('ftp')->put($error_transform_path . $xml_file, $xml_object);
            $responseFormatt = new ResponseFormatt();
            $responseFormatt
                ->setCode(205)
                ->setResponse("No se pudo transformar el archivo XML.");
            return $responseFormatt->returnToJson();
        }
    }
}
