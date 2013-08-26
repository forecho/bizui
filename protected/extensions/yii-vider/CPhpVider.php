<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'phpvider'.DIRECTORY_SEPARATOR.'ProviderManager.php');

class CPhpVider
{
	//其他属性参考phpmailer的配置
    function __construct()
    {
        $this->_manager = new ProviderManager();
    }
    function init()
    {
        $this->_manager->parse = $this->parse;

    }
    // $manager = new ProviderManager();
    // $data = $manager->parse($url); 
}
?>