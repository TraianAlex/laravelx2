<?php

$router->controllers([
	'auth' => 'Auth\AuthController',
]);

$router->resource('/', 'HomeController');
