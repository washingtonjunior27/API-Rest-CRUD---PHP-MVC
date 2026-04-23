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

    public function create()
    {
        header('Content-type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        try {
            $this->userApiService->handleRegistration($data);
            echo json_encode(['success' => true]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
