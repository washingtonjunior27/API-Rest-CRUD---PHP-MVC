<?php

namespace App\Controllers\Api;

use App\Models\User;
use App\Repositories\UserApiRepository;

class UserApiController
{
    private $user;
    private $userApiRepository;

    public function __construct()
    {
        $this->user = new User;
        $this->userApiRepository = new UserApiRepository;
    }

    public function delete()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents('php://input'), true);

        try {
            $id_session = $_SESSION['user_id'];
            $id_form = $data['id_user'];

            if ($id_session != $id_form) {
                throw new \Exception('Usuário não pode ser excluido!');
            }

            $this->userApiRepository->deleteRepository($id_session);
            echo json_encode(['success' => true]);
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
