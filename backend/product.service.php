<?php
include_once 'database.php';
include_once 'product.model.php';

class ProductService {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function getAllProducts() {
        $stmt = $this->product->read();
        $products = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $product_item = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "image" => $image,
                "description" => $description // Ensure this matches your database schema
            );
            array_push($products, $product_item);
        }
        return $products;
    }

    public function createProduct($data) {
        $this->product->name = $data['name'];
        $this->product->price = $data['price'];
        $this->product->image = $data['image'];
        $this->product->description = $data['description']; // Ensure this matches your database schema
        return $this->product->create();
    }
}
?>