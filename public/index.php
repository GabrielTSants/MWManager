<?php
if (file_exists($_SERVER['PATH_INFO'])) return false;
require __DIR__ . '/../autoload.php';
require __DIR__ . '/../src/Controller/InterfaceRequisition.php';

use MWManager\Controller\InterfaceRequisition;
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($_SERVER['PATH_INFO'], $routes)){
  http_response_code(404);
  exit();
}

session_start();

if (!isset($_SESSION['username']) && $_SERVER['PATH_INFO'] !== '/login'){
  header ('Location: /login');
} else if (isset($_SESSION['username']) && $_SERVER['PATH_INFO'] == '/login'){
  header ('Location: /');
}

$path = $routes[$_SERVER['PATH_INFO']];
$controller = new $path();
$controller->process();
