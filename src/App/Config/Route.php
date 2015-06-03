<?php

namespace App\Config;

use WebDevBr\Mvc\Router;

class Route
{
	public static function init()
	{
		Router::set()->add(null, '/');
		Router::set()->add(null, '/{controller}')
			->addValues(array(
		        'action'     => 'index',
		    ));
		Router::set()->add(null, '/{controller}/{action}{/id}')
			->setWildcard('params');
	}
}