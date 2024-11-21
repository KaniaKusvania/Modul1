<?php
require 'vendor/autoload.php';

use app\Routes\ProductRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

(new ProductRoutes())->handle($method, $path);
?>
