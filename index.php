<?php
define('RaizDIR' , __DIR__ );
require_once('./controllers/Autoload.php');
$autoload = new Autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home';
$mexflix = new Router($route);
