<?php

namespace App\Config\ServiceManager\Core;

use App\Config\Config;
use WebDevBr\Mvc\Adapters\TwigAdapter;
use Twig_Environment;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwigService implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		$paths = Config::getPath();

		$options = [
			'cache' => $paths['base'].$paths['view_cache'],
			'auto_reload'=>Config::DEBUG,
			'debug'=>Config::DEBUG
		];

		$twig = new \Twig_Environment(
			new \Twig_Loader_Filesystem($paths['base'].$paths['view_templates']),
			$options
		);

		$view = new TwigAdapter;
		$view->init($twig);
		
		return $view;
	}
}