<?php

require '../bootstrap.php';

use App\Config\Config;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
use WebDevBr\Mvc\Start;

$start = new Start;

if (Config::DEBUG) {
	$whoops = new Run;

	$errorPage = new Whoops\Handler\PrettyPageHandler();

 	$errorPage->setPageTitle("WebDevBr Erro!");
	$errorPage->setEditor("sublime");
	$errorPage->addDataTable("Documentação", array(
      "Url"     => "https://github.com/WebDevBr/Framework/wiki"
	));

	$whoops->pushHandler($errorPage);
	$whoops->register();

	$start->init();
} else {
	try {
		$start->init();
	} catch (Exception $e) {
		$log = new Logger('name');
		$path = dirname(__DIR__).'/'.Config::getPath()['loggin'].'error.log';
		$log->pushHandler(new StreamHandler($path, Logger::WARNING));
		$str = 'Error '.$e->getCode(). ':'.$e->getMessage().PHP_EOL;
		$str .= 'in '.$e->getFile(). ':'.$e->getLine().PHP_EOL;
		$str .= 'Stack trace: '.$e->getTraceAsString ().PHP_EOL;
		$log->addError($str);
		header('HTTP/1.1 404 Not Found');
		echo 'Página não encontrada!';
	}
}


