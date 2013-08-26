<?php
require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'phpvider'.DIRECTORY_SEPARATOR.'ProviderManager.php');

class CPhpVider
{

    $manager = new ProviderManager();
    $data = $manager->parse($url); 
}
?>