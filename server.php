<?php

require 'bootstrap.php';

use App\Config\Config;

echo 'Servidor iniciado em '.Config::SERVER_HOST.':'.Config::SERVER_PORT.PHP_EOL;

$command = '"'.PHP_BINARY.'"';
$command .= ' -S '.Config::SERVER_HOST.':'.Config::SERVER_PORT;
$command .= ' -t "'.Config::SERVER_PUBLIC_DIRECTORY.'"/';
//$command .= ' router.php';

passthru($command);