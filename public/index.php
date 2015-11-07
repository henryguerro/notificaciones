<?php 
require __DIR__.'/../vendor/autoload.php';

$app = new \WebGobernacion\Application(
    new \Illuminate\Container\Container()
);

$app->run();