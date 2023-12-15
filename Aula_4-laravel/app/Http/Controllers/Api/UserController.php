<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->user->all();
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           return response()->json([
            'Message'=>"User efetuado com sucesso",
            "User"=>$this->user->create($request->all())
           ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all());
            return response()->json([
                'Message'=>"User atualizado com sucesso",
                "User"=>$user
            ]);
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
          if($user->delete()){
            return response()->json([
                'Message'=>"User deletado com sucesso",
                "User"=>$user
            ]);
          }
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }

}
