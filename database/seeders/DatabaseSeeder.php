<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClienteSeeder::class,
            FormaSeeder::class,
            GatewaySeeder::class,
            LojaSeeder::class,
            LojaGatewaySeeder::class,
            PedidoSituacaoSeeder::class,
            PedidoSeeder::class,
            PedidoPagamentoSeeder::class
        ]);
    }
}
