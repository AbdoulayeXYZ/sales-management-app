<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'product.controller.php';

$controller = new ProductController();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        $controller->getProducts();
        break;
    case 'POST':
        $controller->createProduct();
        break;
    case 'OPTIONS': // Handle preflight requests
        http_response_code(200);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>