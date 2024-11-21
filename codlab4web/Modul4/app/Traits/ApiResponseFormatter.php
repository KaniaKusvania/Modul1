<?php
namespace app\Traits;

trait ApiResponseFormatter {
    public function apiResponse($code, $message, $data = []) {
        http_response_code($code);
        header("Content-Type: application/json");
        echo json_encode([
            "code" => $code,
            "message" => $message,
            "data" => $data
        ]);
    }
}
?>
