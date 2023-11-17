<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $novoProduto = $request->all();
            $storedProduto = Produto::create($novoProduto);
            $statushttp = 201;
            return response()->json([
                'message' => 'Produto criado com sucesso!',
                'produto' => $storedProduto
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return response()->json(Produto::findOrFail($id));
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $produto = Produto::findOrFail($id);
            $produto->update($request->all());
            $statushttp = 200;
            return response()->json([
                'message' => 'Produto atualizado com sucesso!',
                'produto' => $produto
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try{
            $produto = Produto::findOrFail($id);
            $produto->delete();
            $statushttp = 200;
            return response()->json([
                'm' => "Produto deletado"
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }
}
