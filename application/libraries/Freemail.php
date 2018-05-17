<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Freemail
{
    private $CI;

    private $config = array();

    private $from;
    private $nameFrom;
    private $subject;
    private $to = [];
    private $reply;
    private $nameReply;
    private $message;

    public function __construct()
    {

        $this->CI = &get_instance();
        $this->CI->load->library('email');

        $configMail["protocol"] = getenv('MAIL_DRIVE');
        $configMail['smtp_host'] = getenv('MAIL_HOST');
        $configMail['smtp_port'] = getenv('MAIL_PORT');
        $configMail['smtp_user'] = getenv('MAIL_USER');
        $configMail['smtp_pass'] = getenv('MAIL_PASSWORD');
        $configMail['charset'] = 'utf-8';
        $configMail['mailtype'] = 'html';
        $configMail['newline'] = '\r\n';

        $this->CI->email->initialize($configMail);
    }

    public function setFrom($email, $nameFrom)
    {
        $this->from = $email;
        $this->nameFrom = $nameFrom;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setTo($email)
    {
        $this->to[] = $email;
    }

    public function reply($mailReply, $nameReply)
    {
        $this->repley = $mailReply;
        $this->nameReply = $nameReply;
    }

    public function message($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function send()
    {
        $this->CI->email->from($this->from, $this->nameFrom);
        $this->CI->email->to($this->to);
        $this->CI->email->subject($this->subject);
        $this->CI->email->message($this->message);
        $send = $this->CI->email->send();
        if (getenv('MAIL_DEBUG')) {
            return $this->CI->email->print_debugger();
        }
        return $send;

    }
}
