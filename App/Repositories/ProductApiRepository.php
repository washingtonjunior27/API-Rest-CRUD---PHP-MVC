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

    public function read($search, $limit, $offset)
    {
        $sql = "SELECT * FROM product 
                WHERE id_product LIKE :search OR name_product LIKE :search 
                OR price_product LIKE :search OR brand_product LIKE :search
                LIMIT :limit OFFSET :offset";


        $params = [];
        $searchItem = '%' . $search . '%';
        $params['search'] = $searchItem;

        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $s) {
            $stmt->bindValue(":$key", $s);
        }

        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($search)
    {
        $sql = "SELECT COUNT(*) FROM product 
                WHERE id_product LIKE :search OR name_product LIKE :search 
                OR price_product LIKE :search OR brand_product LIKE :search";

        $params = [];
        $searchItem = '%' . $search . '%';
        $params['search'] = $searchItem;

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchColumn();
    }

    public function findProd($id_prod)
    {
        $sql = "SELECT * FROM product WHERE id_product = :id_product";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_product' => $id_prod]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(Product $prod)
    {
        $sql = "UPDATE product SET name_product = :name_product, price_product = :price_product,
                                brand_product = :brand_product, image_product = :image_product
                WHERE id_product = :id_product";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name_product' => $prod->getName_product(),
            ':price_product' => $prod->getPrice_product(),
            ':brand_product' => $prod->getBrand_product(),
            ':image_product' => $prod->getImage_product(),
            ':id_product' => $prod->getId_product()
        ]);
    }

    public function delete($id_product)
    {
        $sql = "DELETE FROM product WHERE id_product = :id_product";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id_product' => $id_product]);
    }
}
