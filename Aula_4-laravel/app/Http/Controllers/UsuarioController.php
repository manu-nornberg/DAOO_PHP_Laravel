<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        if(User::create($newUsuario))
        return redirect('/users');
    }

    public function show($id): View
    {
        return view('users.show', ['usuario' => User::find($id)]);
    }

    public function update($id): View
    {
        $usuario = User::find($id);
        if (!$usuario)
            dd("usuario não encontrado");
        return view('users.update', [
            'usuario' => $usuario
        ]);
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        $updateUsuario = $request->all();

        if (!User::find($id)->update($updateUsuario));
        return redirect('/users');
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
        if(User::destroy($id))
        return redirect('./users');
    }


}
