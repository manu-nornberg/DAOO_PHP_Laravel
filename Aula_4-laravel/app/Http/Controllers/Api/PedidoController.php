<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    private $pedido;
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->pedido->all();
        return response()->json(Pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           return response()->json([
            'Message'=>"Pedido efetuado com sucesso",
            "Pedido"=>$this->pedido->create($request->all())
           ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
       return $pedido;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        try {
            $pedido->update($request->all());
            return response()->json([
                'Message'=>"Pedido atualizado com sucesso",
                "Pedido"=>$pedido
            ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        try {
          if($pedido->delete()){
            return response()->json([
                'Message'=>"Pedido deletado com sucesso",
                "Pedido"=>$pedido
            ]);
          }
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    public function user(Pedido $pedido){
        return response()->json($pedido->load('user'));
    }
}
