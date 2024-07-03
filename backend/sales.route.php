<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'sales.controller.php';

$controller = new SalesController();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        $controller->getSales();
        break;
    case 'POST':
        if (isset($_GET['filter']) && $_GET['filter'] == 'date') {
            $controller->filterSalesByDate();
        } else {
            $controller->createSale();
        }
        break;
    case 'OPTIONS': // Handle preflight requests
        http_response_code(200);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
?>