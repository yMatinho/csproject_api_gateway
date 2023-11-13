<?php

use Framework\Singleton\App;
use Framework\Singleton\Router\Router;

include("config.php");
include("routes.php");

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST,GET,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');

App::get()->executeApi();
