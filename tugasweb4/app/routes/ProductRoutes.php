<?php
require_once 'app/controllers/ProductController.php';
require_once 'app/models/Product.php';

use App\Controllers\ProductController;

$controller = new ProductController();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$path = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($path[0] === 'api' && $path[1] === 'product') {
    if ($requestMethod === 'GET' && !isset($path[2])) {
        $controller->index();
    } elseif ($requestMethod === 'GET' && isset($path[2])) {
        $controller->getById($path[2]);
    } elseif ($requestMethod === 'POST') {
        $controller->create();
    } elseif ($requestMethod === 'PUT' && isset($path[2])) {
        $controller->update($path[2]);
    } elseif ($requestMethod === 'DELETE' && isset($path[2])) {
        $controller->delete($path[2]);
    }
}
