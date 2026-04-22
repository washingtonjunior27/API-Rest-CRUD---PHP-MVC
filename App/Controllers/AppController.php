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
}
