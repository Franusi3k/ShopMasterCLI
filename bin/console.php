<?php

use App\Core\CliKernel;

require __DIR__ . '/../vendor/autoload.php';

$kernel = new CliKernel();

$kernel->handle($argv);
