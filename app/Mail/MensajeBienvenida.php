<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class MensajeBienvenida extends Mailable
{
    use Queueable, SerializesModels;

    protected $from_mail;
    protected $from_username;
    protected $to_mail;
    protected $reply_to;

    public function __construct()
    {
        $this->from_mail = "ventasweb@dimerc.cl";
        $this->from_username = "Dimerc";
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

    public function getReplyTo()
    {
        return ($this->reply_to) ? $this->reply_to : array('cbracamonte@dimerc.cl', 'dvivanco@dimerc.cl');
    }

    public function setReplyTo($reply_to)
    {
        $this->reply_to = $reply_to;
    }

    public function build()
    {
        return $this
            ->view('mails.bienvenida')
            ->from($this->from_mail, $this->from_username)
            ->to($this->getToMail()) // ->to('phojas@dimerclabs.com')
            ->cc($this->getReplyTo())
            ->replyTo($this->getReplyTo())
            ->bcc('fburgos@dimerclabs.com')
            ->subject('Bienvenido a nuestro sitio');
    }
}
