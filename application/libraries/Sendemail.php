<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class Sendemail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->SMTPDebug = getenv('MAIL_DEBUG');
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Timeout = 60;
        $this->mail->SMTPKeepAlive = true;
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';

        $this->mail->SMTPSecure = getenv('MAIL_SECURE');
        $this->mail->Host = getenv('MAIL_HOST');
        $this->mail->Port = getenv('MAIL_PORT');
        $this->mail->Username = getenv('MAIL_USER');
        $this->mail->Password = getenv('MAIL_PASSWORD');
    }

    public function set_from($email, $name)
    {
        $this->mail->setFrom($email, $name);
    }

    public function set_address($email = '', $name = '')
    {
        $this->mail->AddAddress($email, $name);
    }

    public function set_subject($subject = '')
    {
        $this->mail->Subject = $subject;
    }

    public function set_body($body = '')
    {
        $this->mail->Body = $body;
    }

    public function send()
    {
        return $this->mail->send();
    }
}
