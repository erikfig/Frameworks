<?php

namespace WebDevBr\Mvc\Adapters;

use WebDevBr\Mvc\Interfaces\ViewInterface;

class TwigAdapter implements ViewInterface
{
	protected $view;

	public function init($view)
	{
		$this->view = $view;
	}

	public function render($template, array $data = [])
	{
		return $this->view->render($template, $data);
	}

}