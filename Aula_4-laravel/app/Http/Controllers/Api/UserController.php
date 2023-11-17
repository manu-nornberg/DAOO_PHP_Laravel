<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $novoUser = $request->all();
            $storedUser = User::create($novoUser);
            $statushttp = 201;
            return response()->json([
                'message' => 'User criado com sucesso!',
                'user' => $storedUser
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
            return response()->json(User::findOrFail($id));
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
            $user = User::findOrFail($id);
            $user->update($request->all());
            $statushttp = 200;
            return response()->json([
                'message' => 'User atualizado com sucesso!',
                'user' => $user
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
            $user = User::findOrFail($id);
            $user->delete();
            $statushttp = 200;
            return response()->json([
                'm' => "user deletado"
            ], $statushttp);
        }catch(\Exception $e){
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }
}
