<?php

namespace App\Config\ServiceManager\Core;

use App\Config\Config;
use App\Config\Database;
use WebDevBr\Mvc\Model;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModelService implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{

		$paths = [Config::getPath()['entities']];
		$isDevMode = Config::DEBUG;

		$dbParams = Database::PARAMS;

		$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		
		$entityManager = EntityManager::create($dbParams, $config);

		Model::init($entityManager);
		return Model::getEntityManager();
	}
}