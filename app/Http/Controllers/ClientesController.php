<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getClientes(Request $request){
        
        //Instancia a variável busca com a injenção de dependência Request do laravel
        $busca = $request->busca;

        //Se a busca estiver vazia, apenas carrega a consulta de select pelo nome e email
        if($busca == ""){
            $clientes = Cliente::orderby('nome', 'asc')->select('nome', 'email')->limit(5)->get();
        }else{//senão ordena com a condição do nome like para passar para o javascript
            $clientes = Cliente::orderby('nome', 'asc')->select('nome', 'email')->where('nome', 'like', '%')->limit(5)->get();
        }
        //a resposta será armazenada no array com os valores dos campos "email" e "nome" da tablea clientes
        $resposta = array();
        foreach($clientes as $cliente){
            $resposta[] = array("value"=>$cliente->email,"label"=>$cliente->nome);
        }
        //retorna com a função response() helper do Laravel em json toda a array da consulta
        return response()->json($resposta);
    }
}
