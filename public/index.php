<?php 
require __DIR__.'/../vendor/autoload.php';

use \WebGobernacion\FakeDatabase;
use \WebGobernacion\Http\Controllers\HomeController;
use \Illuminate\Http\Request;

$request= Request::capture();

$controller = new HomeController(new FakeDatabase);

$controller->index($request);