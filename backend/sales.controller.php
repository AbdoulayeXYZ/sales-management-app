<?php
include_once 'sales.service.php';

class SalesController {
    private $service;

    public function __construct() {
        $this->service = new SalesService();
    }

    public function getSales() {
        $sales = $this->service->getAllSales();
        echo json_encode($sales);
    }

    public function createSale() {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($this->service->createSale($data)) {
            echo json_encode(array("message" => "Sale was created."));
        } else {
            echo json_encode(array("message" => "Unable to create sale."));
        }
    }

    public function filterSalesByDate() {
        $data = json_decode(file_get_contents("php://input"), true);
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $sales = $this->service->filterSalesByDate($start_date, $end_date);
        echo json_encode($sales);
    }
}
?>