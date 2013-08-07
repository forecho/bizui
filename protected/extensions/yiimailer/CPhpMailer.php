<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'phpmailer'.DIRECTORY_SEPARATOR.'class.phpmailer.php');

class CPhpMailer
{
    //其他属性参考phpmailer的配置
    function __construct()
    {
        $this->_mailer = new PHPMailer();
        $this->_mailer->CharSet = "utf-8";
        $this->_mailer->IsSMTP();
        $this->_mailer->SMTPAuth = true;
        $this->_mailer->AltBody = "text/html";
        $this->_mailer->IsHTML(true);
    }
    function init()
    {
        $this->_mailer->Host = $this->host;
        $this->_mailer->Port = $this->port;
        $this->_mailer->Username = $this->user;
        $this->_mailer->Password = $this->pass;
        $this->_mailer->From = $this->from;
        $this->_mailer->FromName = $this->fromName;
    }
}
?>