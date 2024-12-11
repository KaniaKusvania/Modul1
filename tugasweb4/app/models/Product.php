<?php
namespace App\Models;

include_once 'app/routes/ProductRoutes.php';
include_once 'app/controllers/ProductController.php';
include_once 'app/config/DatabaseConfig.php';

use App\Config\DatabaseConfig;

class Product {
    private $conn;

    public function __construct() {
        $dbConfig = new DatabaseConfig();
        $this->conn = $dbConfig->getConnection();
    }

    public function findAll() {
        $query = "SELECT * FROM products";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function findById($id) {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($name) {
        $query = "INSERT INTO products (product_name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $name);
        return $stmt->execute();
    }

    public function update($id, $name) {
        $query = "UPDATE products SET product_name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $name, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
