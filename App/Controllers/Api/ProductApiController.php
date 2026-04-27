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
            echo json_encode(['success' => true, 'message' => 'Product successfully registered!']);
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
        $limit = 5;
        $offset = ($page - 1) * $limit;

        try {
            $read = $this->productRepository->read($search, $limit, $offset);
            $count = $this->productRepository->count($search);

            echo json_encode([
                'success' => true,
                'products' => $read,
                'pagination' => [
                    'currentPage' => (int)$page,
                    'totalPages' => (int)ceil($count / $limit),
                    'totalProducts' => (int)$count
                ]
            ]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update()
    {
        header('Content-Type: application/json');

        $data = $_POST;
        $file = $_FILES['product-img'] ?? null;

        try {
            $this->productService->handleUpdate($data, $file);
            echo json_encode(['success' => true, 'message' => 'Product successfully updated!']);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete()
    {
        header('Content-Type: application/json');

        $id = $_GET['id'] ?? null;

        try {
            $this->productService->handleDelete($id);

            echo json_encode(['success' => true, 'message' => 'Product successfully excluded!']);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
