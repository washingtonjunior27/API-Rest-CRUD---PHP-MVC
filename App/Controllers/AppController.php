<?php

namespace App\Controllers;

use App\Repositories\UserApiRepository;

class AppController
{
    private $apiUserRepository;

    public function __construct()
    {
        $this->apiUserRepository = new UserApiRepository;
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('location: ' . BASE_URL . '/login');
            exit;
        }
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/home.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function profile()
    {
        if (!isset($_SESSION['user_login'])) {
            header('location:' . BASE_URL . '/login');
            exit;
        }

        $user = $this->apiUserRepository->findLogin($_SESSION['user_login']);

        if (!$user) {
            header('location:' . BASE_URL . '/login');
            exit;
        }

        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/profile.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function product()
    {
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/newProduct.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }
}
