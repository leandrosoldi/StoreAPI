<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Seeder;

class FormaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPagamento::create([
           'id' => 1,
           'descricao' => 'Boleto Bancário',
        ]);
        FormaPagamento::create([
           'id' => 2,
           'descricao' => 'Depósito Bancário',
        ]);
        FormaPagamento::create([
           'id' => 3,
           'descricao' => 'Cartão de Crédito',
        ]);
    }
}
