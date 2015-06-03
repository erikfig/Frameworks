<?php

namespace App\Config;

class Database
{
	private static $params = [
		'driver'	=> 'pdo_mysql',
		'host'	=>'dev.local',
	    'user'		=> 'root',
	    'password'	=> '123',
	    'dbname'	=> 'estudos_cakephp_doctrine',
	];

	public static function getParams()
	{
		return self::$params;
	}
}