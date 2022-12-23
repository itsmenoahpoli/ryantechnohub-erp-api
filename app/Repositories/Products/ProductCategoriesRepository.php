<?php

namespace App\Repositories\Products;

use App\Repositories\Interfaces\IProductCategoriesRepository;
use App\Models\Products\ProductCategory as Category;

class ProductCategoriesRepository implements IProductCategoriesRepository
{
    public function getCategories($params)
    {
        return Category::orderBy('created_at', 'DESC')->get();
    }

    public function getCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return $category;
    }

    public function createCategory($data)
    {
        $category = Category::create($data);
        return $category;
    }


    public function updateCategory($categoryId, $data)
    {
        $update = Category::findOrFail($categoryId)->update($data);
        return (object) [
            'updated' => $update,
            'category' => $this->getCategory($categoryId)
        ];
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId)->forceDelete();
        return $category;

    }

    public function assignedProducts($categoryId)
    {
        return $this->category()->products;
    }

    private function formatName($name)
    {
        return strtoupper(str_replace(' ', '-', $name));
    }

}