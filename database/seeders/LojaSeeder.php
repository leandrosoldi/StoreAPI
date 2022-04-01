<?php

namespace Database\Seeders;

use App\Models\Loja;
use Illuminate\Database\Seeder;

class LojaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loja::create([
            'id' => 90,
            'nome' => 'LOJA 90'
        ]);
        Loja::create([
            'id' => 92,
            'nome' => 'LOJA 92'
        ]);
        Loja::create([
            'id' => 94,
            'nome' => 'LOJA 94'
        ]);
        Loja::create([
            'id' => 97,
            'nome' => 'LOJA 97'
        ]);
        Loja::create([
            'id' => 98,
            'nome' => 'LOJA 98'
        ]);
        Loja::create([
            'id' => 115,
            'nome' => 'LOJA 115'
        ]);
    }
}
