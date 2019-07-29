<?php
namespace AHT\Webroot;

// use AHT\Router;
// use AHT\Request;
use AHT\Dispatcher;
use AHT\Config\Database;

require_once  '../../vendor/autoload.php';

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

$dispatch = new Dispatcher();
$dispatch->dispatch();
?>