<?php

namespace WebDevBr\Config;

class App
{
	private static $server_host = 'localhost';

	private static $server_port = '8080';

	private static $server_public_directory = 'public/';

	public static function getServer()
	{
		return [
			'host'=>self::$server_host,
			'port'=>self::$server_port,
			'public_directory'=>self::$server_public_directory
		];
	}
}