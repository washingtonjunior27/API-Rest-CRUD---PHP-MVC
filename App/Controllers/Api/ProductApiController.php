<?php

namespace App\Controllers\Api;

use App\Services\ProductApiService;
use App\Repositories\ProductApiRepository;

class ProductApiController
{
    private $productService;
    private $productRepository;

    public function __construct()
    {
        $this->productService = new ProductApiService;
        $this->productRepository = new ProductApiRepository;
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

    public function read()
    {
        header('Content-Type: application/json');

        $page = (int) ($_GET['page'] ?? 1);
        if ($page < 1) $page = 1;
        $search = $_GET['search'] ?? "";
        $limit = 6;
        $offset = ($page - 1) * $limit;

        try {
            $read = $this->productRepository->read($search, $limit, $offset);
            $count = $this->productRepository->count($search);

            echo json_encode([
                'success' => true,
                'products' => $read,
                'pagination' => [
                    'currentPage' => $page,
                    'totalPages' => ceil($count / $limit),
                    'totalProducts' => $count
                ]
            ]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
