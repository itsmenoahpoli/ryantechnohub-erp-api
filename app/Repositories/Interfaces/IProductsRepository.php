<?php

namespace App\Repositories\Interfaces;

interface IProductsRepository
{
    public function getProducts($params);
    public function getProduct($productId);
    public function createProduct($data);
    public function updateProduct($productId, $data);
    public function deleteProduct($productId);
    public function uploadImage($productId, $images);
    public function instockProduct($data);
    public function outstockProduct($data);
    public function batchOutstockProduct($data);
}