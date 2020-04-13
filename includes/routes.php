<?php

//define Routes
$route['/'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/index'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/index.html'] = array('controller' => 'HomeController', 'uniqueName' => 'home');

$route['/home'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.html'] = array('controller' => 'HomeController', 'uniqueName' => 'home');
$route['/home.php'] = array('controller' => 'HomeController', 'uniqueName' => 'home');

$route['/login'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/login.html'] = array('controller' => 'LoginController', 'uniqueName' => 'login');
$route['/anmelden'] = array('controller' => 'LoginController', 'uniqueName' => 'login');

$route['/logout'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');
$route['/logout.html'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');
$route['/abmelden'] = array('controller' => 'LogoutController', 'uniqueName' => 'logout');

$route['/scoreboard'] = array('controller' => 'ScoreboardController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.html'] = array('controller' => 'ScoreboardController', 'uniqueName' => 'scoreboard');
$route['/scoreboard.php'] = array('controller' => 'ScoreboardController', 'uniqueName' => 'scoreboard');

$route['/game'] = array('controller' => 'GameController', 'uniqueName' => 'game');
$route['/game.html'] = array('controller' => 'GameController', 'uniqueName' => 'game');
$route['/game.php'] = array('controller' => 'GameController', 'uniqueName' => 'game');

$route['/rules'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');
$route['/rules.html'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');
$route['/rules.php'] = array('controller' => 'RulesController', 'uniqueName' => 'rules');

$route['/404'] = array('controller' => 'FileNotFoundController', 'uniqueName' => '404');
$route['/404.html'] = array('controller' => 'FileNotFoundController', 'uniqueName' => '404');
$route['/404.php'] = array('controller' => 'FileNotFoundController', 'uniqueName' => '404');