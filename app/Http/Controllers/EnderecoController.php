<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all()->toArray();
        return array_reverse($enderecos);
    }

    public function store(Request $request)
    {
        $endereco = new Endereco([
            'provincia' => $request->input('provincia'),
            'distrito' => $request->input('distrito'),
            'bairro' => $request->input('bairro')
        ]);
        $endereco->save();

        return response()->json('Endereco Criado!');
    }

    public function show($id)
    {
        $endereco = Endereco::find($id);
        return response()->json($endereco);
    }

    public function update($id, Request $request)
    {
        $endereco = Endereco::find($id);
        $endereco->update($request->all());

        return response()->json('Endereco Actualizado!');
    }

    public function destroy($id)
    {
        $endereco = Endereco::find($id);
        $endereco->delete();

        return response()->json('Endereco Apagado!');
    }

}
