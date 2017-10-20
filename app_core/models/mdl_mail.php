<?php

class mdl_Mail{
    var $to = null;
    var $from = null;
    var $subject = null;
    var $body = null;
    var $headers = null;
    
    public function __construct(){}

    function create_Mail($to,$from,$subject,$body){
        $this->to      = $to;
        $this->from    = $from;
        $this->subject = $subject;
        $this->body    = $body;
    }

    function send_Mail(){

        $this->headers = '';
        $this->addHeader('Content-Type:text/html;charset=UTF-8'. PHP_EOL);
        $this->addHeader('From: '.$this->from . PHP_EOL);

        mail($this->to,$this->subject,$this->body,$this->headers)  
        or die("Lo sentimos, debes configurar un servidor de correo (SMTP) primero!");
    }

    function addHeader($header){
        $this->headers .= $header;
    }
}

?>

