<?php
include_once 'database.php';
include_once 'sales.model.php';

class SalesService {
    private $db;
    private $sale;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->sale = new Sale($this->db);
    }

    public function getAllSales() {
        $stmt = $this->sale->read();
        $sales = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $sale_item = array(
                "id" => $id,
                "product_id" => $product_id,
                "quantity" => $quantity,
                "total" => $total,
                "sale_date" => $sale_date
            );
            array_push($sales, $sale_item);
        }
        return $sales;
    }

    public function createSale($data) {
        $this->sale->product_id = $data['product_id'];
        $this->sale->quantity = $data['quantity'];
        $this->sale->total = $data['total'];
        $this->sale->sale_date = date('Y-m-d');
        return $this->sale->create();
    }
}
?>