<?php

namespace App\Config;

class Config
{
	private static $server_host = 'localhost';
	private static $server_port = '8080';
	private static $server_public_directory = 'public/';

	private static $debug = true;

	private static $path = [
		'twig_templates' => 'view/',
		'twig_cache' => 'data/cache/view/',
		'entities' => 'src/App/Entities/'
	];

	private static $controller_namespace = 'App\\Controllers\\';

	public static function getServer()
	{
		return [
			'host'=>self::$server_host,
			'port'=>self::$server_port,
			'public_directory'=>self::$server_public_directory
		];
	}

	public static function getPath()
	{
		$base = [
			'base'=>__DIR__.'/../../../'
		];
		return array_merge(self::$path, $base);
	}

	public static function getDebug()
	{
		return self::$debug;
	}

	public static function getControllerNamespace()
	{
		return self::$controller_namespace;
	}
}