<?php

namespace App\Controllers;

class AppController
{
    public function index()
    {
        require __DIR__ . "/../Views/Layouts/header.php";
        require __DIR__ . "/../Views/Layouts/navbar.php";
        require __DIR__ . "/../Views/App/home.php";
        require __DIR__ . "/../Views/Layouts/footer.php";
    }

    public function profile()
    {
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
