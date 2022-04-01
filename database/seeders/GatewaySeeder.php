<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Seeder;

class GatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gateway::create([
            'id' => 1,
            'descricao' => 'PAGCOMPLETO',
            'endpoint' => 'https://api11.ecompleto.com.br/',
        ]);
        Gateway::create([
            'id' => 2,
            'descricao' => 'CIELO',
            'endpoint' => 'https://api.cielo.com.br/v1/transactions/',
        ]);
        Gateway::create([
            'id' => 3,
            'descricao' => 'PAGSEGURO',
            'endpoint' => 'https://api.pagseguro.com.br/transactions/',
        ]);
    }
}
