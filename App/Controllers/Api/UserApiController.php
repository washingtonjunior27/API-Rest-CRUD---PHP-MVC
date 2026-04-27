<?php

namespace App\Controllers\Api;

use App\Services\UserApiService;

class UserApiController
{
    private $userApiService;

    public function __construct()
    {
        $this->userApiService = new UserApiService;
    }

    public function update()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        try {
            $this->userApiService->handleUpdate($data);
            echo json_encode(['success' => true, 'message' => 'Dados atualizados! Redirecionando para a tela de login!']);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function delete()
    {
        header('Content-Type: application/json');

        $id = $_GET['id_user'] ?? null;

        try {
            $this->userApiService->handleDelete($id);
            echo json_encode(['success' => true, 'message' => 'Usuario excluido! Redirecionando para a tela de login!']);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
