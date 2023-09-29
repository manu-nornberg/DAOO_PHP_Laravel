<?php

namespace App\Http\Controllers;

use App\Models\Transportadora;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransportadoraController extends Controller
{
     //@var Transportadora

     private $transportadora;

     public function __construct()
     {
         $this->transportadora = new Transportadora();
     }

     public function index(): View
     {
         $model = new Transportadora();
         return view('transportadoras.index', ['transportadoras' => $this->transportadora->all()]);
     }

     public function create(): View
     {
         return view('transportadoras.create');
     }

     public function store(Request $request)
     {
         $newTransportadora = $request->all();
         if(Transportadora::create($newTransportadora))
         return redirect('/transportadoras');
     }

     public function show($id): View
     {
         return view('transportadoras.show', ['transportadora' => Transportadora::find($id)]);
     }

     public function update($id): View
     {
         $transportadora = Transportadora::find($id);
         if (!$transportadora)
             dd("transportadora não encontrado");
         return view('transportadoras.update', [
             'transportadora' => $transportadora
         ]);
     }

     public function edit(Request $request, $id): RedirectResponse
     {
         $updatetransportadora = $request->all();

         if (!Transportadora::find($id)->update($updatetransportadora));
         return redirect('/transportadoras');
     }

     public function remove($id): View
     {
         $transportadora = Transportadora::find($id);
         if (!$transportadora)
             dd("transportadora não encontrado");
         return view('transportadoras.remove', [
             'transportadora' => $transportadora
         ]);
     }


     public function delete($id): RedirectResponse
     {
         if(Transportadora::destroy($id))
         return redirect('./transportadoras');
     }

}
