$controller = new ProductController();

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';


header('Content-Type: application/json');

if ($path === '/api/product') {
    if ($method === 'GET') {
        echo $controller->index();
    } elseif ($method === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->insert($data);
    }
} elseif (preg_match('/\/api\/product\/(\d+)/', $path, $matches)) {
    $id = $matches[1];

    if ($method === 'GET') {
        echo $controller->getById($id);
    } elseif ($method === 'PUT') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->update($id, $data);
    } elseif ($method === 'DELETE') {
        echo $controller->delete($id);
    }
} else {
    echo json_encode(["error" => "Invalid route"]);
}
?>