<?php
namespace app\Controller;

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController {
    use ApiResponseFormatter;

    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function index() {
        $data = $this->product->findAll();
        $this->apiResponse(200, "success", $data);
    }

    public function getById($id) {
        $data = $this->product->findById($id);
        $this->apiResponse($data ? 200 : 404, $data ? "success" : "Product not found", $data);
    }

    public function insert() {
        $input = json_decode(file_get_contents("php://input"), true);
        if (isset($input['product_name'])) {
            $result = $this->product->create($input['product_name']);
            $this->apiResponse($result ? 201 : 500, $result ? "Product created" : "Failed to create product");
        } else {
            $this->apiResponse(400, "Invalid input");
        }
    }

    public function update($id) {
        $input = json_decode(file_get_contents("php://input"), true);
        if (isset($input['product_name'])) {
            $result = $this->product->update($id, $input['product_name']);
            $this->apiResponse($result ? 200 : 500, $result ? "Product updated" : "Failed to update product");
        } else {
            $this->apiResponse(400, "Invalid input");
        }
    }

    public function delete($id) {
        $result = $this->product->delete($id);
        $this->apiResponse($result ? 200 : 500, $result ? "Product deleted" : "Failed to delete product");
    }
}
?>
