<?php

use Kernel\App;
use Kernel\Container\Di;
use Kernel\Http\Request;

try {

$di = new Di();

$services = require APP_PATH . '/kernel/config/services.php';
foreach($services as $service) {
    $provider = new $service($di);
    $provider->init();
}

$app = new App($di);
$app->run();


} catch(\Exception $e) {
    print_r($e->getMessage());
}