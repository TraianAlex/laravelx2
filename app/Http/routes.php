<?php

$router->controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

resource('tweets', 'TweetController');

resource('/', 'HomeController');