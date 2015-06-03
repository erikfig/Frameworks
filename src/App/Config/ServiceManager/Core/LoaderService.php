<?php

namespace App\Config\ServiceManager\Core;

use App\Config\Config;
use App\Config\Route;
use WebDevBr\Mvc\Router;
use WebDevBr\Mvc\Loader;
use Aura\Router\RouterFactory;
use Symfony\Component\HttpFoundation\Request;
use Twig_Environment;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

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

		$paths = Config::getPath();

		$options = [
			'cache' => $paths['base'].$paths['twig_cache'],
			'auto_reload'=>Config::getDebug(),
			'debug'=>Config::getDebug()
		];

		$twig = new \Twig_Environment(
			new \Twig_Loader_Filesystem($paths['base'].$paths['twig_templates']),
			$options
		);

		$loader->load(new Request, $twig);
		
		return $loader;
	}
}