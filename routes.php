<?php

use Framework\Singleton\Router\Router;

Router::get()->addPost("auth/login", "App\\Modules\\Auth\\Controller\\AuthController@login", "auth.login");

Router::get()->addGet("patient/findAll", "App\\Modules\\Patient\\Controller\\PatientController@findAll", "patient.findAll");
Router::get()->addGet("patient", "App\\Modules\\Patient\\Controller\\PatientController@find", "patient.find");
Router::get()->addPost("patient", "App\\Modules\\Patient\\Controller\\PatientController@create", "patient.create");
Router::get()->addPut("patient", "App\\Modules\\Patient\\Controller\\PatientController@update", "patient.update");
Router::get()->addDelete("patient", "App\\Modules\\Patient\\Controller\\PatientController@delete", "patient.delete");


Router::get()->addGet("user/findAll", "App\\Modules\\User\\Controller\\UserController@findAll", "user.findAll");
Router::get()->addGet("user", "App\\Modules\\User\\Controller\\UserController@find", "user.find");
Router::get()->addPost("user", "App\\Modules\\User\\Controller\\UserController@create", "user.create");
Router::get()->addPut("user", "App\\Modules\\User\\Controller\\UserController@update", "user.update");
Router::get()->addDelete("user", "App\\Modules\\User\\Controller\\UserController@delete", "user.delete");
