<?php
// Definitions
define('BASE_DIR',dirname(__FILE__));
define('BASE_URL','http://localhost/tonisis/');
// Initializations
$include_dirs=array(
	'controllers',
	'libraries',
	'vendors'
);
set_include_path(get_include_path().PATH_SEPARATOR.BASE_DIR);
foreach($include_dirs as $dir) {
	set_include_path(get_include_path().PATH_SEPARATOR.BASE_DIR.'/'.$dir);
}
function autoload($name) {
	include_once $name.'.php';
}
spl_autoload_register('autoload');
// Include core libraries
require 'ToniCore.php';
// Routing controller & action
$controller_class=ucwords(strtolower(isset($_GET['c']) ? $_GET['c'] : 'home'));
$controller=new $controller_class;
$action=strtolower(isset($_GET['i']) ? $_GET['i'] : 'index');
ob_start();
$controller->$action();
$content=ob_get_clean();
// Outputting
require BASE_DIR.'/layouts/'.$controller->layout.'.php';
