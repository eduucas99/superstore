<?php

namespace App\Services;
use Exception;
use App\Models\Category;

class CategoryService
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;   
    }

    public function getAll()
    {
        return Category::where('available', true)->get();
    }

    public function create(array $data)
    {
        return $this->category->create([
            'name' => $data["name"]
        ]);
    }

   public function update(array $data, $id)
    {
        $category = Category::where('id', $id)->first();
        
        if(!$category){
            throw new Exception("Category Not Found", 204);
        }

        return $category->update([
            'name' => $data["name"],
        ]);
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        
        if(!$category){
            throw new Exception("Category Not Found", 204);
        }

        return $category->update([
            'available' => false
        ]);
    }

    public function getProductsByCategory($id)
    {
        
        $category = Category::with('products')->findOrFail($id);
        
        if(!$category){
            throw new Exception("Category Not Found", 204);
        }  

        $products = $category->products;

        return $products;
    }
}
