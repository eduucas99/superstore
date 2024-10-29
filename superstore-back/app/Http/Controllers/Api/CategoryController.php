<?php

namespace App\Http\Controllers\Api;

use App\Services\CategoryService;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try{
            $data = $this->service->getAll();

            $productResponse = $data->map(function ($category) {
                return [
                    'id' => (string) $category->id,
                    'name' => $category->name,
                ];
            });
    
            return response()->json($productResponse);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),404]);
        }
    }

    public function create(Request $request)
    {
        try{
            $this->service->create($request->all());
            return response()->json(['data'=> "Producto agregado", 200]);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),400]);
        }
    
    }

    public function update(Request $request,$id)
    {
        try{
            $this->service->update($request->all(),$id);
            return response()->json(['data'=> "Producto actualizado", 200]);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),400]);
        }
    }

    public function delete($id)
    { 
        try{
            $this->service->delete($id);
            return response()->json(['data'=> "Producto eliminado", 200]);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),400]);
        }
    }

    public function getProductsByCategory($id)
    {
        try {
            $productsCategory = $this->service->getProductsByCategory($id);
            return response()->json($productsCategory);
        } catch (Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 404);
        }
    }

}
