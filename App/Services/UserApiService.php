<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserApiRepository;

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
            !$data['user-name'] || !$data['user-email'] ||
            !$data['user-phone'] || !$data['user-login'] || !$data['user-pass']
        ) {
            throw new \Exception('Preencha os campos vazios!');
        }

        if ($data['user-pass'] !== $data['user-pass-confirm']) {
            throw new \Exception('Senhas não conferem!');
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
}
