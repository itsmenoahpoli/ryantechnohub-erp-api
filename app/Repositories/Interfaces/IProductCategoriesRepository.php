<?php

namespace App\Repositories\Interfaces;

interface IProductCategoriesRepository
{
    public function getCategories($params);
    public function createCategory($data);
    public function updateCategory($categoryId, $data);
    public function deleteCategory($categoryId);
    public function assignedProducts($categoryId);
}