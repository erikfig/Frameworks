<?php

require 'bootstrap.php';

use App\Config\Config;

$config = Config::getServer();

echo 'Servidor iniciado em '.$config['host'].':'.$config['port'].PHP_EOL;

$command = '"'.PHP_BINARY.'"';
$command .= ' -S '.$config['host'].':'.$config['port'];
$command .= ' -t "'.$config['public_directory'].'"/';
//$command .= ' router.php';

passthru($command);