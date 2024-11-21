<?php
namespace app\Models;

use app\Config\DatabaseConfig;

class Product {
    private $db;

    public function __construct() {
        $this->db = (new DatabaseConfig())->connection;
    }

    public function findAll() {
        $result = $this->db->query("SELECT * FROM products");
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_assoc() : null;
    }

    public function create($product_name) {
        $stmt = $this->db->prepare("INSERT INTO products (product_name) VALUES (?)");
        $stmt->bind_param("s", $product_name);
        return $stmt->execute();
    }

    public function update($id, $product_name) {
        $stmt = $this->db->prepare("UPDATE products SET product_name = ? WHERE id = ?");
        $stmt->bind_param("si", $product_name, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
