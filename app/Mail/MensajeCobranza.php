<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MensajeCobranza extends Mailable
{
    use Queueable, SerializesModels;

    protected $from_mail;
    protected $from_username;
    protected $to_mail;
    protected $numero_pedido;
    protected $monto;
    protected $reply_to;

    public function __construct()
    {
        $this->from_mail = "ventasweb@dimerc.cl";
        $this->from_username = "Dimerc";
    }

    public function getToMail()
    {
        return $this->to_mail;
    }

    public function setToMail($to_mail)
    {
        $this->to_mail = $to_mail;
    }

    public function getReplyTo()
    {
        return ($this->reply_to) ? $this->reply_to : array('cbracamonte@dimerc.cl', 'dvivanco@dimerc.cl');
    }

    public function setReplyTo($replyTo)
    {
        $this->reply_to = $replyTo;
    }

    public function getNumeroPedido()
    {
        return $this->numero_pedido;
    }

    public function setNumeroPedido($numero_pedido)
    {
        $this->numero_pedido = $numero_pedido;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    public function build()
    {
        return $this
            ->view('mails.cobranza')
            ->from($this->from_mail, $this->from_username)
            ->to($this->getToMail())
            ->cc($this->getReplyTo())
            ->replyTo($this->getReplyTo())
            ->bcc('fburgos@dimerclabs.com')
            ->subject('Gracias por comprar en Dimerc.cl - Pedido #' . $this->getNumeroPedido())
            ->with('numeropedido', $this->getNumeroPedido())
            ->with('monto', $this->getMonto());
    }
}
