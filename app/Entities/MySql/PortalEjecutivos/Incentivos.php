<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 07/05/2018
 * Time: 11:03
 */

namespace App\Entities\MySql\PortalEjecutivos;

class Incentivos implements \JsonSerializable
{
    private $id;
    private $rut;
    private $usuario;
    private $nombre;
    private $estado;
    private $grupo;
    private $fechaingreso;
    private $antiguedad;
    private $meta;
    private $promult2meses;
    private $puesto;
    private $cantidadbono5000nuevo;
    private $rutbono5000nuevo;
    private $cantidadbono5000cross;
    private $rutbono5000cross;
    private $porcentajebono100000hace2mes;
    private $porcentajebono100000hace1mes;
    private $porcentajebono100000estemes;
    private $ventacarteraactual;
    private $porcentajebono150000;
    private $ventamesesanopasado;
    private $ventamesesanoactual;
    private $ventamesescarteraactual;
    private $promedioventaanoactual;
    private $fechahoracambio;
    private $marzoanopasado;
    private $marzoanoactualcartera;
    private $cantclinnuevopyme;
    private $cantclinnuevoge;
    private $rutclinuevopyme;
    private $rutclinuevoge;
    private $diciembreanopasado;
    private $eneroactual;
    private $febreroactual;
    private $tienebonoclientenuevo;
    private $tienebonocrecimiento;
    private $metamarzo;
    private $totalpymenuevo;
    private $totalgenuevo;
    private $todosrutpyme;
    private $todosrutge;
    private $todasrspyme;
    private $todasrsge;
    private $todasventapyme;
    private $todasventage;
    private $cumplimientopyme;
    private $cumplimientoge;
    private $rutrelacionadopyme;
    private $rutrelacionadoge;
    private $totalotro;

    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
    }

    public function getFechaingreso()
    {
        return $this->fechaingreso;
    }

    public function setFechaingreso($fechaingreso)
    {
        $this->fechaingreso = $fechaingreso;
    }

    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function setMeta($meta)
    {
        $this->meta = $meta;
    }

    public function getPromult2meses()
    {
        return $this->promult2meses;
    }

    public function setPromult2meses($promult2meses)
    {
        $this->promult2meses = $promult2meses;
    }

    public function getPuesto()
    {
        return $this->puesto;
    }

    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;
    }

    public function getCantidadbono5000nuevo()
    {
        return $this->cantidadbono5000nuevo;
    }

    public function setCantidadbono5000nuevo($cantidadbono5000nuevo)
    {
        $this->cantidadbono5000nuevo = $cantidadbono5000nuevo;
    }

    public function getRutbono5000nuevo()
    {
        return $this->rutbono5000nuevo;
    }

    public function setRutbono5000nuevo($rutbono5000nuevo)
    {
        $this->rutbono5000nuevo = $rutbono5000nuevo;
    }

    public function getCantidadbono5000cross()
    {
        return $this->cantidadbono5000cross;
    }

    public function setCantidadbono5000cross($cantidadbono5000cross)
    {
        $this->cantidadbono5000cross = $cantidadbono5000cross;
    }

    public function getRutbono5000cross()
    {
        return $this->rutbono5000cross;
    }

    public function setRutbono5000cross($rutbono5000cross)
    {
        $this->rutbono5000cross = $rutbono5000cross;
    }

    public function getPorcentajebono100000hace2mes()
    {
        return $this->porcentajebono100000hace2mes;
    }

    public function setPorcentajebono100000hace2mes($porcentajebono100000hace2mes)
    {
        $this->porcentajebono100000hace2mes = $porcentajebono100000hace2mes;
    }

    public function getPorcentajebono100000hace1mes()
    {
        return $this->porcentajebono100000hace1mes;
    }

    public function setPorcentajebono100000hace1mes($porcentajebono100000hace1mes)
    {
        $this->porcentajebono100000hace1mes = $porcentajebono100000hace1mes;
    }

    public function getPorcentajebono100000estemes()
    {
        return $this->porcentajebono100000estemes;
    }

    public function setPorcentajebono100000estemes($porcentajebono100000estemes)
    {
        $this->porcentajebono100000estemes = $porcentajebono100000estemes;
    }

    public function getVentacarteraactual()
    {
        return $this->ventacarteraactual;
    }

    public function setVentacarteraactual($ventacarteraactual)
    {
        $this->ventacarteraactual = $ventacarteraactual;
    }

    public function getPorcentajebono150000()
    {
        return $this->porcentajebono150000;
    }

    public function setPorcentajebono150000($porcentajebono150000)
    {
        $this->porcentajebono150000 = $porcentajebono150000;
    }

    public function getVentamesesanopasado()
    {
        return $this->ventamesesanopasado;
    }

    public function setVentamesesanopasado($ventamesesanopasado)
    {
        $this->ventamesesanopasado = $ventamesesanopasado;
    }

    public function getVentamesesanoactual()
    {
        return $this->ventamesesanoactual;
    }

    public function setVentamesesanoactual($ventamesesanoactual)
    {
        $this->ventamesesanoactual = $ventamesesanoactual;
    }

    public function getVentamesescarteraactual()
    {
        return $this->ventamesescarteraactual;
    }

    public function setVentamesescarteraactual($ventamesescarteraactual)
    {
        $this->ventamesescarteraactual = $ventamesescarteraactual;
    }

    public function getPromedioventaanoactual()
    {
        return $this->promedioventaanoactual;
    }

    public function setPromedioventaanoactual($promedioventaanoactual)
    {
        $this->promedioventaanoactual = $promedioventaanoactual;
    }

    public function getFechahoracambio()
    {
        return $this->fechahoracambio;
    }

    public function setFechahoracambio($fechahoracambio)
    {
        $this->fechahoracambio = $fechahoracambio;
    }

    public function getMarzoanopasado()
    {
        return $this->marzoanopasado;
    }

    public function setMarzoanopasado($marzoanopasado)
    {
        $this->marzoanopasado = $marzoanopasado;
    }

    public function getMarzoanoactualcartera()
    {
        return $this->marzoanoactualcartera;
    }

    public function setMarzoanoactualcartera($marzoanoactualcartera)
    {
        $this->marzoanoactualcartera = $marzoanoactualcartera;
    }

    public function getCantclinnuevopyme()
    {
        return $this->cantclinnuevopyme;
    }

    public function setCantclinnuevopyme($cantclinnuevopyme)
    {
        $this->cantclinnuevopyme = $cantclinnuevopyme;
    }

    public function getCantclinnuevoge()
    {
        return $this->cantclinnuevoge;
    }

    public function setCantclinnuevoge($cantclinnuevoge)
    {
        $this->cantclinnuevoge = $cantclinnuevoge;
    }

    public function getRutclinuevopyme()
    {
        return $this->rutclinuevopyme;
    }

    public function setRutclinuevopyme($rutclinuevopyme)
    {
        $this->rutclinuevopyme = $rutclinuevopyme;
    }

    public function getRutclinuevoge()
    {
        return $this->rutclinuevoge;
    }

    public function setRutclinuevoge($rutclinuevoge)
    {
        $this->rutclinuevoge = $rutclinuevoge;
    }

    public function getDiciembreanopasado()
    {
        return $this->diciembreanopasado;
    }

    public function setDiciembreanopasado($diciembreanopasado)
    {
        $this->diciembreanopasado = $diciembreanopasado;
    }

    public function getEneroactual()
    {
        return $this->eneroactual;
    }

    public function setEneroactual($eneroactual)
    {
        $this->eneroactual = $eneroactual;
    }

    public function getFebreroactual()
    {
        return $this->febreroactual;
    }

    public function setFebreroactual($febreroactual)
    {
        $this->febreroactual = $febreroactual;
    }

    public function getTienebonoclientenuevo()
    {
        return $this->tienebonoclientenuevo;
    }

    public function setTienebonoclientenuevo($tienebonoclientenuevo)
    {
        $this->tienebonoclientenuevo = $tienebonoclientenuevo;
    }

    public function getTienebonocrecimiento()
    {
        return $this->tienebonocrecimiento;
    }

    public function setTienebonocrecimiento($tienebonocrecimiento)
    {
        $this->tienebonocrecimiento = $tienebonocrecimiento;
    }

    public function getMetamarzo()
    {
        return $this->metamarzo;
    }

    public function setMetamarzo($metamarzo)
    {
        $this->metamarzo = $metamarzo;
    }

    public function getTotalpymenuevo()
    {
        return $this->totalpymenuevo;
    }

    public function setTotalpymenuevo($totalpymenuevo)
    {
        $this->totalpymenuevo = $totalpymenuevo;
    }

    public function getTotalgenuevo()
    {
        return $this->totalgenuevo;
    }

    public function setTotalgenuevo($totalgenuevo)
    {
        $this->totalgenuevo = $totalgenuevo;
    }

    public function getTodosrutpyme()
    {
        return $this->todosrutpyme;
    }

    public function setTodosrutpyme($todosrutpyme)
    {
        $this->todosrutpyme = $todosrutpyme;
    }

    public function getTodosrutge()
    {
        return $this->todosrutge;
    }

    public function setTodosrutge($todosrutge)
    {
        $this->todosrutge = $todosrutge;
    }

    public function getTodasrspyme()
    {
        return $this->todasrspyme;
    }

    public function setTodasrspyme($todasrspyme)
    {
        $this->todasrspyme = $todasrspyme;
    }

    public function getTodasrsge()
    {
        return $this->todasrsge;
    }

    public function setTodasrsge($todasrsge)
    {
        $this->todasrsge = $todasrsge;
    }

    public function getTodasventapyme()
    {
        return $this->todasventapyme;
    }

    public function setTodasventapyme($todasventapyme)
    {
        $this->todasventapyme = $todasventapyme;
    }

    public function getTodasventage()
    {
        return $this->todasventage;
    }

    public function setTodasventage($todasventage)
    {
        $this->todasventage = $todasventage;
    }

    public function getCumplimientopyme()
    {
        return $this->cumplimientopyme;
    }

    public function setCumplimientopyme($cumplimientopyme)
    {
        $this->cumplimientopyme = $cumplimientopyme;
    }

    public function getCumplimientoge()
    {
        return $this->cumplimientoge;
    }

    public function setCumplimientoge($cumplimientoge)
    {
        $this->cumplimientoge = $cumplimientoge;
    }

    public function getRutrelacionadopyme()
    {
        return $this->rutrelacionadopyme;
    }

    public function setRutrelacionadopyme($rutrelacionadopyme)
    {
        $this->rutrelacionadopyme = $rutrelacionadopyme;
    }

    public function getRutrelacionadoge()
    {
        return $this->rutrelacionadoge;
    }

    public function setRutrelacionadoge($rutrelacionadoge)
    {
        $this->rutrelacionadoge = $rutrelacionadoge;
    }

    public function getTotalotro()
    {
        return $this->totalotro;
    }

    public function setTotalotro($totalotro)
    {
        $this->totalotro = $totalotro;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->getId(),
            'rut' => $this->getRut(),
            'usuario' => $this->getUsuario(),
            'nombre' => $this->getNombre(),
            'estado' => $this->getEstado(),
            'grupo' => $this->getGrupo(),
            'fechaingreso' => $this->getFechaingreso(),
            'antiguedad' => $this->getAntiguedad(),
            'meta' => $this->getMeta(),
            'promult2meses' => $this->getPromult2meses(),
            'puesto' => $this->getPuesto(),
            'cantidadbono5000nuevo' => $this->getCantidadbono5000nuevo(),
            'rutbono5000nuevo' => $this->getRutbono5000nuevo(),
            'cantidadbono5000cross' => $this->getCantidadbono5000cross(),
            'rutbono5000cross' => $this->getRutbono5000cross(),
            'porcentajebono100000hace2mes' => $this->getPorcentajebono100000hace2mes(),
            'porcentajebono100000hace1mes' => $this->getPorcentajebono100000hace1mes(),
            'porcentajebono100000estemes' => $this->getPorcentajebono100000estemes(),
            'ventacarteraactual' => $this->getVentacarteraactual(),
            'porcentajebono150000' => $this->getPorcentajebono150000(),
            'ventamesesanopasado' => $this->getVentamesesanopasado(),
            'ventamesesanoactual' => $this->getVentamesesanoactual(),
            'ventamesescarteraactual' => $this->getVentamesescarteraactual(),
            'promedioventaanoactual' => $this->getPromedioventaanoactual(),
            'fechahoracambio' => $this->getFechahoracambio(),
            'marzoanopasado' => $this->getMarzoanopasado(),
            'marzoanoactualcartera' => $this->getMarzoanoactualcartera(),
            'cantclinnuevopyme' => $this->getCantclinnuevopyme(),
            'cantclinnuevoge' => $this->getCantclinnuevoge(),
            'rutclinuevopyme' => $this->getRutclinuevopyme(),
            'rutclinuevoge' => $this->getRutclinuevoge(),
            'diciembreanopasado' => $this->getDiciembreanopasado(),
            'eneroactual' => $this->getEneroactual(),
            'febreroactual' => $this->getFebreroactual(),
            'tienebonoclientenuevo' => $this->getTienebonoclientenuevo(),
            'tienebonocrecimiento' => $this->getTienebonocrecimiento(),
            'metamarzo' => $this->getMetamarzo(),
            'totalpymenuevo' => $this->getTotalpymenuevo(),
            'totalgenuevo' => $this->getTotalgenuevo(),
            'todosrutpyme' => $this->getTodosrutpyme(),
            'todosrutge' => $this->getTodosrutge(),
            'todasrspyme' => $this->getTodasrspyme(),
            'todasrsge' => $this->getTodasrsge(),
            'todasventapyme' => $this->getTodasventapyme(),
            'todasventage' => $this->getTodasventage(),
            'cumplimientopyme' => $this->getCumplimientopyme(),
            'cumplimientoge' => $this->getCumplimientoge(),
            'rutrelacionadopyme' => $this->getRutrelacionadopyme(),
            'rutrelacionadoge' => $this->getRutrelacionadoge(),
            'totalotro' => $this->getTotalotro(),
        ];
    }
}