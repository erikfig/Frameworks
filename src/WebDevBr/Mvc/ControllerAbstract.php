<?php

namespace WebDevBr\Mvc;

use Symfony\Component\HttpFoundation\Request;
use App\Config\Config;
use WebDevBr\Mvc\Interfaces\ViewInterface;

abstract class ControllerAbstract
{
	private $request;
	protected $response;
	protected $view;

	public function init(Array $params, Request $request, ViewInterface $view)
	{
		$this->request = new Request(
		    $_GET,
		    $_POST,
		    $params,
		    $_COOKIE,
		    $_FILES,
		    $_SERVER
		);

		$this->view = $view;
	}

	protected function getRequest()
	{
		return $this->request;
	}

	protected function render($template, array $data = [])
	{
		$default = [
			'base_url'=>$this->baseUrl()
		];
		echo $this->view->render($template, array_merge($default, $data));
	}

	private function baseUrl(){
		$protocol = 'http';
	    if(isset($_SERVER['HTTPS'])){
	        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	    }
	    return $protocol . "://" . $_SERVER['HTTP_HOST'];
	}
}