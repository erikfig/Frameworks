<?php

namespace WebDevBr\Mvc;

use WebDevBr\Exceptions\HttpException;
use Aura\Router\RouterFactory;

class Router
{

	private static $router;

	public static function init(RouterFactory $router)
	{
		self::$router = $router->newInstance();
	}

	public static function set()
	{
		return self::$router;
	}

	public static function match($path)
	{
		$route = self::$router->match($path, $_SERVER);
		if (! $route) 
		    throw new HttpException("Route not found!", 404);

		$default = [];

		if (!isset($route->params['controller']))
		    $default['controller'] = 'index';

		if (!isset($route->params['action'])) 
		    $default['action'] = 'index';

		return array_merge($route->params, $default);
	}

}