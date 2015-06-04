<?php

namespace App\Config;

use App\Config\ServiceManager\Core\ModelService;
use App\Config\ServiceManager\Core\LoaderService;
use App\Config\ServiceManager\Core\TwigService;
use App\Config\ServiceManager\Core\MustacheService;
use App\Config\ServiceManager\RepositoryService;
use Zend\ServiceManager\ServiceManager as Sm;

class ServiceManager
{
	private static $service_manager;

	public static function init(Sm $service_manager)
	{
		$service_manager->setFactory('model', new ModelService);
		$service_manager->setFactory('twig', new TwigService);
		//$service_manager->setFactory('mustache', new MustacheService);

		$repository_service = new RepositoryService;

		$repository_service->setEntity('App\Entities\Products');
		$service_manager->setFactory('products', $repository_service);

		self::$service_manager = $service_manager;
	}

	public static function getServiceManager()
	{
		return self::$service_manager;
	}
}