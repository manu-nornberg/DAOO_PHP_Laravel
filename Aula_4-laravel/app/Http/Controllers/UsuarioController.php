<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //@var Usuario

    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index(): View
    {
        $model = new Usuario();
        $collectionUsuarios = Usuario::all();
        return view('usuarios.index', ['usuarios' => $this->usuario->all()]);
    } 

    public function create(): View
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $newUsuario = $request->all();
        if(Usuario::create($newUsuario))
        return redirect('/usuarios');
    }

    public function show($id): View
    {
        return view('usuarios.show', ['usuario' => Usuario::find($id)]);
    }

    public function update($id): View
    {
        $usuario = Usuario::find($id);
        if (!$usuario)
            dd("usuario não encontrado");
        return view('usuarios.update', [
            'usuario' => $usuario
        ]);
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        $updateUsuario = $request->all();

        if (!Usuario::find($id)->update($updateUsuario));
        return redirect('/usuarios');
    }

    public function remove($id): View
    {
        $usuario = Usuario::find($id);
        if (!$usuario)
            dd("usuario não encontrado");
        return view('usuarios.remove', [
            'usuario' => $usuario
        ]);
    }


    public function delete($id): RedirectResponse
    {
        if(Usuario::destroy($id))
        return redirect('./usuarios');
    }


}
