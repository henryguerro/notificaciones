<?php 
require __DIR__.'/../vendor/autoload.php';

$app = new \Notificaciones\Application(
    new \Illuminate\Container\Container()
);

$app->run();