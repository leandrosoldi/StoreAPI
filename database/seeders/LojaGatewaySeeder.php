<?php

namespace Database\Seeders;

use App\Models\LojaGateway;
use Illuminate\Database\Seeder;

class LojaGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LojaGateway::create([
            'id' => 1,
            'id_loja' => 90,
            'id_gateway' => 1
        ]);
        LojaGateway::create([
            'id' => 2,
            'id_loja' => 92,
            'id_gateway' => 2
        ]);
        LojaGateway::create([
            'id' => 3,
            'id_loja' => 115,
            'id_gateway' => 1
        ]);
        LojaGateway::create([
            'id' => 4,
            'id_loja' => 98,
            'id_gateway' => 1
        ]);
        LojaGateway::create([
            'id' => 5,
            'id_loja' => 97,
            'id_gateway' => 1
        ]);
        LojaGateway::create([
            'id' => 6,
            'id_loja' => 94,
            'id_gateway' => 1
        ]);
    }
}
