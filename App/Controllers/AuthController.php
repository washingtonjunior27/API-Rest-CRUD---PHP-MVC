<?php

namespace App\Controllers;

class AuthController
{
    public function index()
    {
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Auth/login.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function register()
    {
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Auth/register.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('location:' . BASE_URL . '/login');
    }
}
