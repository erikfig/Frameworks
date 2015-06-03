<?php

namespace App\Config\ServiceManager;

use App\Config\ServiceManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RepositoryService implements FactoryInterface
{
	private $entity;

	public function setEntity($entity)
	{
		$this->entity = $entity;
	}

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$service_manager = ServiceManager::getServiceManager();
		$em = $service_manager->get('model');

		return $em->getRepository($this->entity);
	}
}