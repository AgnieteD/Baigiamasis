<?php

use Core\Router;

Router::add('index', '/index', '\App\Controllers\HomeController', 'index');
Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index');
Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController', 'index');
Router::add('register', '/register', '\App\Controllers\Auth\RegisterController', 'index');