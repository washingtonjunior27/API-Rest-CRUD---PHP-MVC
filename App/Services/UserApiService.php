<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserApiRepository;
use Exception;

class UserApiService
{
    private $user;
    private $userApiRepository;

    public function __construct()
    {
        $this->user = new User;
        $this->userApiRepository = new UserApiRepository;
    }

    public function handleRegistration($data)
    {
        if (
            empty($data['user-name']) || empty($data['user-email']) ||
            empty($data['user-phone']) || empty($data['user-login']) || empty($data['user-pass'])
        ) {
            throw new \Exception('Preencha os campos vazios!');
        }

        if ($data['user-pass'] !== $data['user-pass-confirm']) {
            throw new \Exception('Senhas não conferem!');
        }

        if (strlen($data['user-pass']) < 6) {
            throw new \Exception('Senha deve ter mais que 6 caracteres!');
        }

        $login = $this->userApiRepository->findLogin($data['user-login']);

        if ($login) {
            throw new \Exception('Login não disponivel!');
        }

        $this->user->setName_user(trim($data['user-name'] ?? ""));
        $this->user->setLogin_user(trim($data['user-login'] ?? ""));
        $this->user->setEmail_user(trim($data['user-email'] ?? ""));
        $this->user->setPhone_user(trim($data['user-phone'] ?? ""));

        $options = [
            'memory_cost' => 65000,
            'time_cost' => 3,
            'threads' => 2
        ];

        $password_hash = password_hash($data['user-pass'], PASSWORD_ARGON2ID, $options);
        $this->user->setPassword_user($password_hash);

        return $this->userApiRepository->createRepository($this->user);
    }

    public function handleLogin($data)
    {
        if (empty($data['user-login']) || empty($data['user-pass'])) {
            throw new \Exception('Preencha os campos vazios!');
        }

        $login = $this->userApiRepository->findLogin($data['user-login']);

        if (!$login) {
            throw new \Exception('Login não encontrado!');
        }

        if (!password_verify($data['user-pass'], $login['password_user'])) {
            throw new \Exception('Senha incorreta!');
        }

        $_SESSION['user_id'] = $login['id_user'];
        $_SESSION['user_login'] = $login['login_user'];

        return true;
    }

    public function handleUpdate($data)
    {
        if (
            empty($data['user-name']) || empty($data['user-email']) ||
            empty($data['user-phone']) || empty($data['user-login']) || empty($data['user-pass'])
        ) {
            throw new \Exception('Preencha os campos vazios!');
        }

        if ($data['user-pass'] !== $data['user-pass-confirm']) {
            throw new \Exception('Senhas não conferem!');
        }

        if (strlen($data['user-pass']) < 6) {
            throw new \Exception('Senha deve ter mais que 6 caracteres!');
        }

        $id_session = $_SESSION['user_id'];
        $id_form = $data['id_user_update'];

        if ($id_session != $id_form) {
            throw new \Exception('Usuário não pode ser editado!');
        }

        $login = $this->userApiRepository->findLogin($data['user-login']);

        if ($login && ($login['id_user'] != $id_session)) {
            throw new \Exception('Login não disponivel!');
        }

        $this->user->setId_user($id_session);
        $this->user->setName_user(trim($data['user-name'] ?? ""));
        $this->user->setLogin_user(trim($data['user-login'] ?? ""));
        $this->user->setEmail_user(trim($data['user-email'] ?? ""));
        $this->user->setPhone_user(trim($data['user-phone'] ?? ""));

        $options = [
            'memory_cost' => 65000,
            'time_cost' => 3,
            'threads' => 2
        ];

        $password_hash = password_hash($data['user-pass'], PASSWORD_ARGON2ID, $options);
        $this->user->setPassword_user($password_hash);

        $this->userApiRepository->updateRepository($this->user);

        return true;
    }

    public function handleDelete($id)
    {
        $id_session = $_SESSION['user_id'];

        if ($id_session != $id) {
            throw new \Exception('Usuário não pode ser excluido!');
        }

        $this->userApiRepository->deleteRepository($id_session);

        return true;
    }
}
