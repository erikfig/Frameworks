<?php

require 'bootstrap.php';

use WebDevBr\Config\App;

$config = App::getServer();

echo 'Servidor iniciado em '.$config['host'].':'.$config['port'].PHP_EOL;

$command = '"'.PHP_BINARY.'"';
$command .= ' -S '.$config['host'].':'.$config['port'];
$command .= ' -t "'.$config['public_directory'].'"/';
$command .= ' router.php';

passthru($command);