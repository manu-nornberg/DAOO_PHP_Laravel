<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdutoController extends Controller
{
    // @var Produto

    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index(): View
    {
        $model = new Produto();
        return view('index', ['produtos' => $this->produto->all()]);
    }

    public function show($id): View
    {
        return view('show', ['produto' => Produto::find($id)]);
    }

    public function update($id): View
    {
        $produto = Produto::find($id);
        if (!$produto)
            dd("Produto não encontrado");
        return view('update', [
            'produto' => $produto
        ]);
    }

    public function edit(Request $request, $id): RedirectResponse
    {
        $updateProduto = $request->all();

        if (!Produto::find($id)->update($updateProduto));
        return redirect('./produtos');
    }

    public function remove($id): View
    {
        $produto = Produto::find($id);
        if (!$produto)
            dd("Produto não encontrado");
        return view('remove', [
            'produto' => $produto
        ]);
    }


    public function delete($id): RedirectResponse
    {
        if(!Produto::destroy($id))
        return redirect('./produtos');
    }

    public function create(): View
    {
        return view('create');
    }
}
