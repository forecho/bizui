<?php

// change the following paths if necessary
$yiic=dirname(__FILE__).'/../../yii/framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';
@putenv('YII_CONSOLE_COMMANDS='. dirname(__FILE__).'/commands' );
require_once($yiic);
