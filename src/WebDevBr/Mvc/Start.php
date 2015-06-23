<?php

namespace WebDevBr\Mvc;

use Aura\Router\RouterFactory;
use App\Config\ServiceManager;
use App\Config\Config;
use App\Config\Route;
use Symfony\Component\HttpFoundation\Request;
use WebDevBr\Mvc\Router;
use WebDevBr\Mvc\Loader;
use Zend\ServiceManager\ServiceManager as Sm;

class Start
{
	public function init()
	{
		Router::init(new RouterFactory);
		Route::init();

		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		$params = Router::match($url);

		$loader = new Loader();
		$loader->init($params, Config::CONTROLLER_NAMESPACE);

		$service_manager = new Sm;
		ServiceManager::init($service_manager);

		$view =ServiceManager::getServiceManager()->get(Config::TEMPLATE_ENGINER);

		$loader->load(new Request, $view);
	}
}