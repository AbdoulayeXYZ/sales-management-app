<?php
class Sale {
    private $conn;
    private $table_name = "sales";

    public $id;
    public $product_id;
    public $quantity;
    public $total;
    public $sale_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET product_id=:product_id, quantity=:quantity, total=:total, sale_date=:sale_date";
        $stmt = $this->conn->prepare($query);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->sale_date = htmlspecialchars(strip_tags($this->sale_date));

        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":sale_date", $this->sale_date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function filterByDate($start_date, $end_date) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE sale_date BETWEEN :start_date AND :end_date";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam(":end_date", $end_date);

        $stmt->execute();
        return $stmt;
    }
}
?>