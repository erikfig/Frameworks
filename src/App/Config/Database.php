<?php

namespace App\Config;

class Database
{
	const PARAMS = [
		'driver'	=> 'pdo_mysql',
		'host'	=>'dev.local',
	    'user'		=> 'root',
	    'password'	=> '123',
	    'dbname'	=> 'estudos_cakephp_doctrine',
	];
}