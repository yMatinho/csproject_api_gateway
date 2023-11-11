<?php

use Framework\Singleton\Router\Router;

Router::get()->addPost("auth/login", "App\\Modules\\Auth\\Controller\\AuthController@login", "auth.login");

Router::get()->addGet("patient/findAll", "App\\Modules\\Patient\\Controller\\PatientController@findAll", "patient.findAll");
Router::get()->addGet("patient", "App\\Modules\\Patient\\Controller\\PatientController@find", "patient.find");
Router::get()->addPost("patient", "App\\Modules\\Patient\\Controller\\PatientController@create", "patient.create");
