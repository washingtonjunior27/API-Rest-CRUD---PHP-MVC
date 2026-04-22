<?php

namespace App\Controllers;

class AuthController
{
    public function login() {}

    public function register() {}

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('location:' . BASE_URL . '/login');
    }

    public function home() {}
}
