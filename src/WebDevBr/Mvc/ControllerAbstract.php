<?php

namespace WebDevBr\Mvc;

use Symfony\Component\HttpFoundation\Request;
use App\Config\Config;
use Twig_Environment;

abstract class ControllerAbstract
{
	protected $request;
	protected $response;
	protected $twig;

	public function init(Array $params, Request $request, Twig_Environment $twig)
	{
		$this->request = new Request(
		    $_GET,
		    $_POST,
		    $params,
		    $_COOKIE,
		    $_FILES,
		    $_SERVER
		);

		$this->twig = $twig;
	}

	protected function render($template, array $data = [])
	{
		
		$default = [
			'base_url'=>$this->baseUrl()
		];
		echo $this->twig->render($template, array_merge($default, $data));
	}

	private function baseUrl(){
		$protocol = 'http';
	    if(isset($_SERVER['HTTPS'])){
	        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	    }
	    return $protocol . "://" . $_SERVER['HTTP_HOST'];
	}
}