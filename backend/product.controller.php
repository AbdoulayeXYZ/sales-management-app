<?php
include_once 'product.service.php';

class ProductController {
    private $service;

    public function __construct() {
        $this->service = new ProductService();
    }

    public function getProducts() {
        $products = $this->service->getAllProducts();
        echo json_encode($products);
    }

    public function createProduct() {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->service->createProduct($data)) {
            echo json_encode(array("message" => "Product was created."));
        } else {
            echo json_encode(array("message" => "Unable to create product."));
        }
    }
}
?>