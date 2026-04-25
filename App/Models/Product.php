<?php

namespace App\Models;

class Product
{
    private int $id_product;
    private string $name_product;
    private string $price_product;
    private string $brand_product;
    private string $image_product;

    /**
     * Get the value of id_product
     */
    public function getId_product()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */
    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }

    /**
     * Get the value of name_product
     */
    public function getName_product()
    {
        return $this->name_product;
    }

    /**
     * Set the value of name_product
     *
     * @return  self
     */
    public function setName_product($name_product)
    {
        $this->name_product = $name_product;

        return $this;
    }

    /**
     * Get the value of price_product
     */
    public function getPrice_product()
    {
        return $this->price_product;
    }

    /**
     * Set the value of price_product
     *
     * @return  self
     */
    public function setPrice_product($price_product)
    {
        $this->price_product = $price_product;

        return $this;
    }

    /**
     * Get the value of brand_product
     */
    public function getBrand_product()
    {
        return $this->brand_product;
    }

    /**
     * Set the value of brand_product
     *
     * @return  self
     */
    public function setBrand_product($brand_product)
    {
        $this->brand_product = $brand_product;

        return $this;
    }

    /**
     * Get the value of image_product
     */
    public function getImage_product()
    {
        return $this->image_product;
    }

    /**
     * Set the value of image_product
     *
     * @return  self
     */
    public function setImage_product($image_product)
    {
        $this->image_product = $image_product;

        return $this;
    }
}
