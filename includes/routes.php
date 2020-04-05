<?php

//define Routes
$route['/'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index'] = array('controller' => 'IndexController', 'uniqueName' => 'index');
$route['/index.html'] = array('controller' => 'IndexController', 'uniqueName' => 'index');


$route['/login'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/login.html'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/anmelden'] = array('controller' => 'LoginController', 'uniqueName' => 'login');

$route['/logout'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');
$route['/logout.html'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');

$route['/adresse'] = array('controller' => 'AddressDetailController', 'uniqueName' => 'addressdetail');

$route['/scoreboard'] = array('controller' => 'GameController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.html'] = array('controller' => 'GameController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.php'] = array('controller' => 'GameController', 'uniqueName' => 'scoreboard');

$route['/home'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.html'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.php'] = array('controller' => 'HomeController', 'uniqueName' => 'home');

