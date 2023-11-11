<?php

require("vendor/autoload.php");

define("MAIN_DIR", __DIR__.'/');
define("SITE_URL", "http://localhost:8085/");
define("USER_SERVICE_URL", "http://users_api/");
define("AUTH_SERVICE_URL", "http://auth_api/");

define("DB_DATABASE", "");
define("DB_USERNAME", "");
define("DB_PASSWORD", "");
define("DB_PORT", null);
define("DB_HOST", "");

spl_autoload_register(function($class) {
    $class = str_replace("\\","/", $class);
    if(!file_exists(MAIN_DIR.'src/' . $class . '.php'))
        return;
    include MAIN_DIR.'src/' . $class . '.php';
});