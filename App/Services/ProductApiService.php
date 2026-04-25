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
        if (empty($data['product-name']) || empty($data['product-price']
            || empty($data['product-brand']))) {
            throw new \Exception('Preencha os campos vazios!');
        }

        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            throw new \Exception('Falha ao carregar imagem!');
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nameImage = md5(uniqid()) . '.' . strtolower($extension);
        $destiny = __DIR__ . "/../../public/Assets/img/" . $nameImage;

        if (!move_uploaded_file($file['tmp_name'], $destiny)) {
            throw new \Exception('Erro ao salvar imagem no servidor!');
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
}
