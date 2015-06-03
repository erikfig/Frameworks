<?php

require '../bootstrap.php';

use App\Config\ServiceManager\ModelService;
use App\Config\ServiceManager\LoaderService;
use App\Config\ServiceManager as Sm;
use Zend\ServiceManager\ServiceManager;

try {
	$service_manager = new ServiceManager;
	Sm::init($service_manager);
	$service_manager = Sm::getServiceManager();
	$service_manager->get('loader');
} catch (WebDevBr\Exceptions\HttpException $e) {
	echo 'Error('.$e->getCode().') "'.$e->getMessage().'" in '.$e->getFile().':'.$e->getLine();
	echo '<pre>';
	print_r($e->getTraceAsString());
	echo '</pre>';
	die();
}


