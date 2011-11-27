<?php
define('BASE_DIR',dirname(__FILE__));
$yii=BASE_DIR.'/protected/vendors/yii/yii.php';
$config=BASE_DIR.'/protected/config/main.php';
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);
Yii::createWebApplication($config)->run();
