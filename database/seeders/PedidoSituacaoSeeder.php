<?php

namespace Database\Seeders;

use App\Models\PedidoSituacao;
use Illuminate\Database\Seeder;

class PedidoSituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PedidoSituacao::create([
            'id' => 1,
            'descricao' => 'Aguardando Pagamento'
        ]);
        PedidoSituacao::create([
            'id' => 2,
            'descricao' => 'Pagamento Identificado'
        ]);
        PedidoSituacao::create([
            'id' => 3,
            'descricao' => 'Pedido Cancelado'
        ]);
        PedidoSituacao::create([
            'id' => 4,
            'descricao' => 'Pagamento em Análise de Crédito'
        ]);
    }
}
