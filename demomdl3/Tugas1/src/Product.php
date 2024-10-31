<?php
namespace App;

require_once 'BaseEntity.php';

class Product extends BaseEntity {
    private $productName;
    private $price;

    public function __construct($productName, $price) {
        parent::__construct();
        $this->productName = $productName;
        $this->price = $price;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function displayInfo() {
        echo "Product ID: " . $this->getId() . "<br>";
        echo "Product Name: " . $this->getProductName() . "<br>";
        echo "Price: $" . $this->getPrice() . "<br>";
        echo "Created At: " . $this->getCreatedAt() . "<br>";
    }
}
?>
