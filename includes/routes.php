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

$route['/scoreboard'] = array('controller' => 'ScoreController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.html'] = array('controller' => 'ScoreController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.php'] = array('controller' => 'ScoreController', 'uniqueName' => 'scoreboard');

$route['/home'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.html'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.php'] = array('controller' => 'HomeController', 'uniqueName' => 'home');

$route['/game'] = array('controller' => 'GameController', 'uniqueName' => 'game');
$route['/game.html'] = array('controller' => 'GameController', 'uniqueName' => 'game');
$route['/game.php'] = array('controller' => 'GameController', 'uniqueName' => 'game');

$route['/rules'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');
$route['/rules.html'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');
$route['/rules.php'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');