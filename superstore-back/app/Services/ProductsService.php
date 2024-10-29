<?php

namespace App\Services;
use Exception;
use App\Models\Product;

class ProductsService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;   
    }

    public function getAll()
    {
        $products = Product::where('available', true)->get();
        return $products;
    }

    public function create(array $data)
    {
        $product = $this->product->create([
            'name' => $data["name"],
            'description' => $data["description"],
            'image_url' => $data["image_url"],
            'cta_url' => $data["cta_url"]
        ]);
    
        if (isset($data['category_ids'])) {
            $product->categories()->attach($data['category_ids']);
        }
    
        return $product;
       
    }

   public function update(array $data, $id)
    {
        $product = Product::where('id', $id)->first();

        if(!$product){
            throw new Exception("Product Not Found", 204);
        }

        return $product->update([
            'name' => $data["name"],
            'description' => $data["description"],
            'image_url' => $data["image_url"],
            'cta_url' => $data["cta_url"]
        ]);
    }

    public function delete(array $data)
    {
        $product = Product::where('id', $data['id'])->first();
        
        if(!$product){
            throw new Exception("Product Not Found", 204);
        }

        return $this->product->update([
            'available' => false
        ]);
    }

}
