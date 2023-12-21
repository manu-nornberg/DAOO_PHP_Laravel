<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $usersPaginated = User::paginate($perPage);
        $usersPaginated->appends([
            'per_page' => $perPage
        ]);
        return response()->json($usersPaginated);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = 200;
        try {
            $newUser = $request->all();
            $newUser['password'] = Hash::make($newUser['password']);

            $createdUser = User::create($newUser);
            $createdUser->markEmailAsVerified(); #Verificação de email fake

            $response = [
                'mensagem' => 'Usuário cadastrado com sucesso!!',
                'user' => $createdUser
            ];
        } catch (\Exception $error) {
            $status = 500;
            $response = ['error' => $error->getMessage()];
        }
        return response()->json($response, $status);
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
                'Message' => "User atualizado com sucesso",
                "User" => $user
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
            if ($user->delete()) {
                return response()->json([
                    'Message' => "User deletado com sucesso",
                    "User" => $user
                ]);
            }
        } catch (\Exception $e) {
            $statushttp = 500;
            return response()->json(['message' => $e->getMessage()], $statushttp);
        }
    }
}
