<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\Pedido;
use App\Models\PedidoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
   
    public function list(){
        $pedidos = $this->listarPedidos();
        $gateways = Gateway::all();
        return view('pedidos',compact('pedidos','gateways'));
    }

    public function listarPedidos(){
        $pedidos = Pedido::with('cliente','situacao','loja.gateway','pagamento')
                       ->orderBy('id_situacao')->get();
        foreach ($pedidos as $ped) {
            $ped->gateway = $ped->loja->gateway[0];
        }
        return $pedidos;
    }

    public function paymentPagCompleto(Request $request)
    {
        $pedido = $request['pedido'];
        if($pedido['pagamento']['id_formapagto'] != 3){
            return response()->json(false);
        }
        $cardExpArray = explode('-',$pedido['pagamento']['vencimento']);
        $cardExp = $cardExpArray[1].''.substr($cardExpArray[0],2,2);

        $postData = [
            "external_order_id" => $pedido['id'],
            "amount" => floatval($pedido['valor_total']),
            "card_number" => $pedido['pagamento']['num_cartao'],
            "card_cvv" => strval($pedido['pagamento']['codigo_verificacao']),
            "card_expiration_date" => $cardExp,
            "card_holder_name" =>  $pedido['pagamento']['nome_portador'],
            "customer" => [
                "external_id" =>  $pedido['cliente']['id'],
                "name" =>  $pedido['cliente']['nome'],
                "type" => $pedido['cliente']['tipo_pessoa'] == "F" ? "individual" : "corporation",
                "email" => $pedido['cliente']['email'],
                "documents" => [
                    [
                        "type" => 'cpf',
                        "number" => $pedido['cliente']['cpf_cnpj']
                    ]
                ],
                "birthday" => \Carbon\Carbon::parse($pedido['cliente']['data_nasc'])->format('Y-m-d')
            ]
        ];

        $url = $pedido['gateway']['endpoint'].'exams/processTransaction';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData) );
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: '.config('app.api_key_pagcompleto'),
            'Content-Type' => 'application/json' 
            ));

        $resp = json_decode(curl_exec($curl),true);
        curl_close($curl);
        if(!$resp['Error']){
            $this->atualizarPedido($pedido,$resp);
        }
        $retorno['resp'] = $resp;
        $retorno['lista'] = $this->listarPedidos();
        return response()->json($retorno);   
    }

    public function atualizarPedido($pedido, $resp)
    {
        $transaction = $resp['Transaction_code'];
        Pedido::where('id',$pedido['id'])->update([
            'id_situacao' => in_array($transaction,['03','04']) ? 3 :
                             ($transaction == '00' ? 2 :
                              (
                                  $transaction == '01' ? 4 : 1)
                              )
        ]);

        PedidoPagamento::where('id',$pedido['pagamento']['id'])
                        ->update([
                            'retorno_intermediador' => $resp['Message'],
                            'data_processamento'    => date_create()
                        ]);
    }

    public function resetDB()
    {
        Pedido::whereIn('id',[98306,98307,98308])
                    ->update(['id_situacao' => 1]);
        PedidoPagamento::whereIn('id_pedido',[98306,98307,98308])
                        ->update([
                            'retorno_intermediador' => null,
                            'data_processamento'    => null
                        ]);
    }
}
