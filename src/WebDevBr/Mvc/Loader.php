<?php

namespace WebDevBr\Mvc;

use WebDevBr\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Twig_Environment;

class Loader
{

	private $params;
	private $load;

	public function init(Array $params, $namespace)
	{
		$this->params = $params;
		$this->setNamespace($namespace);
		$this->setActionName();
	}

	private function setNamespace($namespace)
	{
		$namespace .= ucfirst($this->params['controller']);
		$namespace .= 'Controller';
		$this->load['controller'] = $namespace;
	}

	private function setActionName()
	{
		$action = $this->params['action'];
		$action .= 'Action';
		$this->load['action'] = $action;
	}

	public function load(Request $request, Twig_Environment $twig)
	{
		if (!class_exists($this->load['controller']))
			throw new HttpException($this->load['controller']."  not found", 404);

		$controller = new $this->load['controller'];
		$action = $this->load['action'];

		$controller->init($this->params, $request, $twig);

		if (!method_exists($controller, $action))
			throw new HttpException($this->load['action']." not found", 404);

		$controller->$action();
	}

}