<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Pedido::create([
           'id' => 98302,
           'valor_total' => '250.74',
           'valor_frete' => '33.4',
           'data' => '20/08/2021',
           'id_cliente' => 8796,
           'id_loja' => 90,
           'id_situacao' => 3
       ]);
       Pedido::create([
           'id' => 98303,
           'valor_total' => '583.92',
           'valor_frete' => '57.85',
           'data' => '23/08/2021',
           'id_cliente' => 5789,
           'id_loja' => 92,
           'id_situacao' => 1
       ]);
       Pedido::create([
           'id' => 98304,
           'valor_total' => '97.25',
           'valor_frete' => '17.50',
           'data' => '23/08/2021',
           'id_cliente' => 6748,
           'id_loja' => 90,
           'id_situacao' => 2
       ]);
       Pedido::create([
           'id' => 98305,
           'valor_total' => '66.89',
           'valor_frete' => '22.55',
           'data' => '25/08/2021',
           'id_cliente' => 6872,
           'id_loja' => 115,
           'id_situacao' => 2
       ]);
       Pedido::create([
           'id' => 98306,
           'valor_total' => '115.9',
           'valor_frete' => '19.5',
           'data' => '25/08/2021',
           'id_cliente' => 6716,
           'id_loja' => 98,
           'id_situacao' => 1
       ]);
       Pedido::create([
           'id' => 98307,
           'valor_total' => '153.72',
           'valor_frete' => '25.5',
           'data' => '25/08/2021',
           'id_cliente' => 4802,
           'id_loja' => 97,
           'id_situacao' => 1
       ]);
       Pedido::create([
           'id' => 98308,
           'valor_total' => '87.9',
           'valor_frete' => '13.5',
           'data' => '26/08/2021',
           'id_cliente' => 9484,
           'id_loja' => 94,
           'id_situacao' => 1
       ]);
       Pedido::create([
           'id' => 98309,
           'valor_total' => '223.9',
           'valor_frete' => '28.75',
           'data' => '27/08/2021',
           'id_cliente' => 1827,
           'id_loja' => 90,
           'id_situacao' => 2
       ]);
       Pedido::create([
           'id' => 98310,
           'valor_total' => '58.9',
           'valor_frete' => '19.85',
           'data' => '27/08/2021',
           'id_cliente' => 2280,
           'id_loja' => 92,
           'id_situacao' => 1
       ]);
    }
}
