<?php

namespace App\Config;

class Config
{
	const SERVER_HOST = 'localhost';
	const SERVER_PORT = '8080';
	const SERVER_PUBLIC_DIRECTORY = 'public/';
	const TEMPLATE_ENGINER = 'twig';

	const DEBUG = true;

	const PATH = [
		'view_templates' => 'view/',
		'view_cache' => 'data/cache/view/',
		'loggin' => 'data/log/erros/',
		'entities' => 'src/App/Entities/'
	];

	const CONTROLLER_NAMESPACE = 'App\\Controllers\\';

	public static function getPath()
	{
		$base = [
			'base'=>__DIR__.'/../../../'
		];
		return array_merge(Config::PATH, $base);
	}

}