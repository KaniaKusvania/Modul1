<?php
namespace app\Routes;

use app\Controller\ProductController;

class ProductRoutes {
    public function handle($method, $path) {
        $controller = new ProductController();

        switch ($method) {
            case 'GET':
                if (preg_match('/^\/api\/product\/(\d+)$/', $path, $matches)) {
                    $controller->getById((int)$matches[1]);
                } else {
                    $controller->index();
                }
                break;

            case 'POST':
                $controller->insert();
                break;

            case 'PUT':
                if (preg_match('/^\/api\/product\/(\d+)$/', $path, $matches)) {
                    $controller->update((int)$matches[1]);
                }
                break;

            case 'DELETE':
                if (preg_match('/^\/api\/product\/(\d+)$/', $path, $matches)) {
                    $controller->delete((int)$matches[1]);
                }
                break;

            default:
                http_response_code(405);
                echo json_encode(["message" => "Method Not Allowed"]);
                break;
        }
    }
}
?>
