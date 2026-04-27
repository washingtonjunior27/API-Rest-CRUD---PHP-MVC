<?php

namespace App\Controllers;

use App\Repositories\UserApiRepository;
use App\Repositories\ProductApiRepository;

class AppController
{
    private $apiUserRepository;
    private $apiProdRepository;

    public function __construct()
    {
        $this->apiUserRepository = new UserApiRepository;
        $this->apiProdRepository = new ProductApiRepository;
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
        if (!isset($_SESSION['user_login'])) {
            header('location:' . BASE_URL . '/login');
            exit;
        }
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/newProduct.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function editProduct()
    {
        if (!isset($_SESSION['user_login'])) {
            header('location:' . BASE_URL . '/login');
            exit;
        }

        $product = $this->apiProdRepository->findProd($_GET['id_product']);

        if (!$product) {
            header('location:' . BASE_URL . '/login');
            exit;
        }

        $_SESSION['edit_id_product'] = $product['id_product'];

        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/editProduct.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }
}
