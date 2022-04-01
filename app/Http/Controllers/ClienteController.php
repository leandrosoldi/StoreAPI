<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function list(){
        $clientes = Cliente::with('loja')->get();
        return view('clientes',compact('clientes'));
    }
}
