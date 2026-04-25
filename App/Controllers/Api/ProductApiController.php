<?php

namespace App\Controllers\Api;

use App\Services\ProductApiService;

class ProductApiController
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductApiService;
    }

    public function create()
    {
        header('Content-Type: application/json');

        $data = $_POST;
        $file = $_FILES['product-img'] ?? null;

        try {
            $this->productService->handleCreate($data, $file);
            echo json_encode(['success' => true, 'message' => 'Producto cadastrado com sucesso!']);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
