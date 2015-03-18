<?php

header('Content-Type: text/html; charset=utf-8');

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));

require 'Library'.DS.'Erik'.DS.'Core'.DS.'AutoLoad.php';
$autoLoad = new AutoLoad();
$autoLoad->setPath(ROOT);
$autoLoad->setExt('php');

spl_autoload_register(array($autoLoad, 'loadApp'));
spl_autoload_register(array($autoLoad, 'loadModulos'));
spl_autoload_register(array($autoLoad, 'loadCore'));
spl_autoload_register(array($autoLoad, 'load'));

use Erik\Core\Router;

$router = new Router();