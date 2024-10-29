<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductsService;
use Throwable;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try{
            $data = $this->service->getAll();
            return response()->json($data);
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

    public function update(Request $request, $id)
    {
        try{
            $this->service->update($request->all(), $id);
            return response()->json(['data'=> "Producto actualizado", 200]);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),400]);
        }
    }

    public function delete(Request $request)
    { 
        try{
            $this->service->delete($request->all());
            return response()->json(['data'=> "Producto eliminado", 200]);
        }catch(Throwable $th){
            return response()->json(['error'=>$th->getMessage(),400]);
        }
    }
}
