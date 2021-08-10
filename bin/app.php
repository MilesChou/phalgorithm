<?php

use App\Commands\Perm;
use Symfony\Component\Console\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app->addCommands([
    new Perm(),
]);

return $app->run();
