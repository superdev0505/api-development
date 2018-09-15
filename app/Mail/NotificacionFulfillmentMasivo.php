<?php
/**
 * Created by PhpStorm.
 * User: web1
 * Date: 16/03/2018
 * Time: 10:12
 */

namespace App\Mail;

use App\PDO\MySql\Cerberus\UsuariosPortalBIPDO;
use App\PDO\Oracle\DMVentas\ReProvProPDO;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NotificacionFulfillmentMasivo extends Mailable
{
    use Queueable, SerializesModels;

    protected $from_mail;
    protected $from_username;
    protected $to_mail;
    protected $nombre_destinatario;

    protected $numeroregistros;
    protected $numeroregistros_ok;
    protected $numeroregistros_error;
    protected $SKUs = array();

    public function __construct()
    {
        $this->from_mail = "desarrollo@ofimarket.cl";
        $this->from_username = "Desarrollos Dimerc Labs";
    }

    public function getFromMail()
    {
        return $this->from_mail;
    }

    public function setFromMail($from_mail)
    {
        $this->from_mail = $from_mail;
    }

    public function getFromUsername()
    {
        return $this->from_username;
    }

    public function setFromUsername($from_username)
    {
        $this->from_username = $from_username;
    }

    public function getToMail()
    {
        return $this->to_mail;
    }

    public function setToMail($to_mail)
    {
        $this->to_mail = $to_mail;
    }

    public function getNumeroregistros()
    {
        return $this->numeroregistros;
    }

    public function setNumeroregistros($numeroregistros)
    {
        $this->numeroregistros = $numeroregistros;
    }

    public function getNumeroregistrosOk()
    {
        return $this->numeroregistros_ok;
    }

    public function setNumeroregistrosOk($numeroregistros_ok)
    {
        $this->numeroregistros_ok = $numeroregistros_ok;
    }

    public function getNumeroregistrosError()
    {
        return $this->numeroregistros_error;
    }

    public function setNumeroregistrosError($numeroregistros_error)
    {
        $this->numeroregistros_error = $numeroregistros_error;
    }

    public function getSKUs()
    {
        return $this->SKUs;
    }

    public function setSKUs($SKUs)
    {
        $this->SKUs = $SKUs;
    }

    public function addSKU($new_sku) {
        $this->SKUs[]= $new_sku;
    }

    public function getNombreDestinatario()
    {
        return $this->nombre_destinatario;
    }

    public function setNombreDestinatario($in_userkey)
    {
        // 1.- Obtener datos del usuario por su API KEY
        if($usuario = UsuariosPortalBIPDO::getUsuarioByApikey($in_userkey)) {
            $this->nombre_destinatario = $usuario->nombre . " ". $usuario->apellido;
            $this->to_mail = $usuario->email;
        }
        else {
            $this->nombre_destinatario = 'undefined';
            $this->to_mail = "fburgos@dimerc.cl";
        }
    }

    public function build()
    {
        // Buscar todos los SKUs con sus datos.
        $productos = ReProvProPDO::getProductosBySkus($this->getSKUs());
        $nombre_destinatario = $this->getNombreDestinatario();

        // Enviar correo
        return $this
            ->view('mails.skus-fulfillment-masivo')
            ->from($this->from_mail, $this->from_username)
            ->to($this->getToMail())
            ->replyTo('fburgos@dimerclabs.com')
            ->bcc('fburgos@dimerclabs.com')
            ->subject('Notificación creación de Productos Fulfillment masivo ('. $this->getNumeroregistrosOk() .')')
            ->with('productos', $productos)
            ->with('usuario', $nombre_destinatario)
            ->with('cantidad_ok', $this->getNumeroregistrosOk())
            ->with('cantidad', $this->getNumeroregistros());
    }
}
