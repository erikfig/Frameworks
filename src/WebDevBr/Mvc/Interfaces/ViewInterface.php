<?php

namespace WebDevBr\Mvc\Interfaces;

interface ViewInterface
{

	public function init($class);

	public function render($file, Array $data);
}