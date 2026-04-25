<?php

namespace App\Repositories;

use PDO;
use PDOException;
use App\Models\Product;
use App\Config\Connection;

class ProductApiRepository
{
    private $pdo;

    public function __construct()
    {
        $con = new Connection();
        $this->pdo = $con->getConn();
    }

    public function create(Product $product)
    {
        $sql = "INSERT INTO product (name_product, price_product, brand_product, image_product)
                VALUES (:name_product, :price_product, :brand_product, :image_product)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name_product' => $product->getName_product(),
            ':price_product' => $product->getPrice_product(),
            ':brand_product' => $product->getBrand_product(),
            ':image_product' => $product->getImage_product()
        ]);
    }
}
