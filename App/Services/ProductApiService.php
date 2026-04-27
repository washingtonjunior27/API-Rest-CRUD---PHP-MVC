<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductApiRepository;

class ProductApiService
{
    private $product;
    private $productApiRepository;

    public function __construct()
    {
        $this->product = new Product;
        $this->productApiRepository = new ProductApiRepository;
    }

    public function handleCreate($data, $file)
    {
        if (
            empty($data['product-name']) || empty($data['product-price'])
            || empty($data['product-brand'])
        ) {
            throw new \Exception('Fill in the empty fields.');
        }

        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Failed to load image!');
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nameImage = md5(uniqid()) . '.' . strtolower($extension);
        $destiny = __DIR__ . "/../../public/Assets/img/" . $nameImage;

        $uploadDir = __DIR__ . "/../../public/Assets/img/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!move_uploaded_file($file['tmp_name'], $destiny)) {
            throw new \Exception('Error saving image to server!');
        }

        $this->product->setName_product($data['product-name']);

        $preco = str_replace(',', '.', $data['product-price']);
        $this->product->setPrice_product(
            number_format((float)$preco, 2, '.', '')
        );

        $this->product->setBrand_product($data['product-brand']);
        $this->product->setImage_product($nameImage);

        return $this->productApiRepository->create($this->product);
    }

    public function handleUpdate($data, $file)
    {
        if (
            empty($data['product-name']) || empty($data['product-price'])
            || empty($data['product-brand'])
        ) {
            throw new \Exception('Fill in the empty fields.');
        }

        if (!isset($_SESSION['edit_id_product']) || $_SESSION['edit_id_product'] != $data['update-product-id']) {
            throw new \Exception("Invalid edition token!");
        }

        $product = $this->productApiRepository->findProd($data['update-product-id']);

        if (!$product) {
            throw new \Exception("Product not found!");
        }

        $nameImage = $product['image_product'];

        if (!empty($file['name']) && $file['error'] === UPLOAD_ERR_OK) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $nameImage = md5(uniqid()) . '.' . strtolower($extension);
            $destiny = __DIR__ . "/../../public/Assets/img/" . $nameImage;

            $uploadDir = __DIR__ . "/../../public/Assets/img/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (move_uploaded_file($file['tmp_name'], $destiny)) {
                $oldPath = __DIR__ . "/../../public/Assets/img/" . $product['image_product'];
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            } else {
                throw new \Exception('Error saving image to server!');
            }
        }




        $this->product->setId_product($data['update-product-id']);
        $this->product->setName_product($data['product-name']);

        $preco = str_replace(',', '.', $data['product-price']);
        $this->product->setPrice_product(
            number_format((float)$preco, 2, '.', '')
        );

        $this->product->setBrand_product($data['product-brand']);
        $this->product->setImage_product($nameImage);

        $result = $this->productApiRepository->update($this->product);

        if ($result) {
            unset($_SESSION['edit_id_product']);
        }

        return $result;
    }

    public function handleDelete($id)
    {
        if (!$id) {
            throw new \Exception('Product ID not provided!');
        }

        $product = $this->productApiRepository->findProd($id);

        if (!$product) {
            throw new \Exception('Product not found!');
        }

        $nameImage = $product['image_product'];
        $oldPath = __DIR__ . "/../../public/Assets/img/" . $nameImage;
        if (file_exists($oldPath)) {
            @unlink($oldPath);
        }

        $this->productApiRepository->delete($id);
    }
}
