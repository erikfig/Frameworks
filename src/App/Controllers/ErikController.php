<?php

namespace App\Controllers;

use WebDevBr\Mvc\ControllerAbstract;
use WebDevBr\Mvc\Model;
use App\Config\ServiceManager;

class ErikController extends ControllerAbstract
{
	public function figueiredoAction()
	{
		$productRepository = ServiceManager::getServiceManager()->get('products');
		$products = $productRepository->findAll();

		$this->render('index.html', ['products'=>$products]);
	}
}