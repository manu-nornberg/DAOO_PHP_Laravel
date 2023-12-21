<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    //@var User

    private $usuario;

    public function __construct()
    {
        $this->usuario = new User();
    }

    public function index(): View
    {
        $model = new User();
        $collectionUsuarios = User::all();
        return view('users.index', ['usuarios' => $this->usuario->all()]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $newUsuario = $request->all();
        if (User::create($newUsuario))
            return redirect('/users');
    }

    public function show($id): View
    {
        return view('users.show', ['usuario' => User::find($id)]);
    }

    public function update($id): View
    {
        $user = Auth::user();
        $usuario = User::find($id);

        if ($user->roles->contains('name', 'admin') || ($usuario->id === Auth::id() && $user->roles->contains('name', 'client'))) {
            return view('users.update', [
                'usuario' => $usuario
            ]);
        }
        return response()->json(['error' => 'Você não tem permissão para atualizar o perfil de outros usuários'], 403);
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        $updateUsuario = $request->all();
        $usuario = User::find($id);

        if ($usuario && ($usuario->id === Auth::id() || Auth::user()->roles->contains('name', 'admin'))) {
            $usuario->update($updateUsuario);
            return redirect('/users');
        }


        return redirect('/users')->with('error', 'Você não tem permissão para editar este perfil');
    }

    public function remove($id): View
    {
        $usuario = User::find($id);
        if (!$usuario)
            dd("usuario não encontrado");
        return view('users.remove', [
            'usuario' => $usuario
        ]);
    }


    public function delete($id): RedirectResponse
    {
        if (User::destroy($id))
            return redirect('./users');
    }
}
