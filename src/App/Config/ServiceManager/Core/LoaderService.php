<?php

namespace App\Config\ServiceManager\Core;

use App\Config\Config;
use App\Config\Route;
use WebDevBr\Mvc\Router;
use WebDevBr\Mvc\Loader;
use Aura\Router\RouterFactory;
use Symfony\Component\HttpFoundation\Request;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use App\Config\ServiceManager;

class LoaderService implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		Router::init(new RouterFactory);
		Route::init();

		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		$params = Router::match($url);

		$loader = new Loader();
		$loader->init($params, Config::getControllerNamespace());

		$view =ServiceManager::getServiceManager()->get('twig');

		$loader->load(new Request, $view);
		
		return $loader;
	}
}