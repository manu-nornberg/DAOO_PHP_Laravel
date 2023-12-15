<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->produto->all();
        return response()->json(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           return response()->json([
            'Message'=>"Produto efetuado com sucesso",
            "Produto"=>$this->produto->create($request->all())
           ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
       return $produto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        try {
            $produto->update($request->all());
            return response()->json([
                'Message'=>"Produto atualizado com sucesso",
                "Produto"=>$produto
            ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        try {
          if($produto->delete()){
            return response()->json([
                'Message'=>"Produto deletado com sucesso",
                "Produto"=>$produto
            ]);
          }
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }
}
