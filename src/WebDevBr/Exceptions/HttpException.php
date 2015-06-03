<?php

namespace WebDevBr\Exceptions;

class HttpException extends \Exception
{
	public function __construct ($message, $code = 0, \Exception $previous = NULL)
	{
		http_response_code(404);
		parent::__construct($message, $code, $previous);
	}
}