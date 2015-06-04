<?php

namespace App\Config\ServiceManager\Core;

use App\Config\Config;
use WebDevBr\Mvc\Adapters\MustacheAdapter;
use Mustache_Engine;
use Mustache_Loader_FilesystemLoader;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MustacheService implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		$paths = Config::getPath();

		$options = [
			'loader' => new Mustache_Loader_FilesystemLoader($paths['base'].$paths['view_templates'])
		];

		$mustache = new Mustache_Engine(
			$options
		);

		$view = new MustacheAdapter;
		$view->init($mustache);
		
		return $view;
	}
}