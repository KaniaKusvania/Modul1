<?php
namespace App\Controllers;

include_once 'app/models/Product.php';
include_once 'app/routes/ProductRoutes.php';

use App\Models\Product;

class ProductController {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function index() {
        echo json_encode($this->product->findAll());
    }

    public function getById($id) {
        echo json_encode($this->product->findById($id));
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->product->create($data['product_name']);
        echo json_encode(['message' => 'Product created successfully']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->product->update($id, $data['product_name']);
        echo json_encode(['message' => 'Product updated successfully']);
    }

    public function delete($id) {
        $this->product->delete($id);
        echo json_encode(['message' => 'Product deleted successfully']);
    }
}
