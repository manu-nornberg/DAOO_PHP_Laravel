<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $novoPedido = $request->all();
            $storedPedido = Pedido::create($novoPedido);
            $statushttp = 201;
            return response()->json([
                'message' => 'Pedido criado com sucesso!',
                'pedido' => $storedPedido
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
            return response()->json(Pedido::findOrFail($id));
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
            $pedido = Pedido::findOrFail($id);
            $pedido->update($request->all());
            $statushttp = 200;
            return response()->json([
                'message' => 'pedido atualizado com sucesso!',
                'pedido' => $pedido
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $pedido = Pedido::findOrFail($id);
            $pedido->delete();
            $statushttp = 200;
            return response()->json([
                'm' => "pedido deletado"
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }
}
