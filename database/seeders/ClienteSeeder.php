<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'id' => 1827,
            'nome' => 'Thales André Pereira',
            'cpf_cnpj' => '13440817709',
            'email' => 'samuel.castro@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '07/04/1995',
            'id_loja' => 90
        ]);
        Cliente::create([
            'id' => 2280,
            'nome' => 'Heloisa Valentina Fabiana Moura',
            'cpf_cnpj' => '99386767660',
            'email' => 'heloisavalentina@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '12/12/1984',
            'id_loja' => 92
        ]);
        Cliente::create([
            'id' => 4802,
            'nome' => 'Fernando Julio Ramos',
            'cpf_cnpj' => '20499776461',
            'email' => 'fernando_julio99@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '11/09/1999',
            'id_loja' => 97
        ]);
        Cliente::create([
            'id' => 5789,
            'nome' => 'Renato Ryan Lopes',
            'cpf_cnpj' => '78891957615',
            'email' => 'renato_ryan@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '08/02/1947',
            'id_loja' => 92
        ]);
        Cliente::create([
            'id' => 6716,
            'nome' => 'Raquel Nicole Moura',
            'cpf_cnpj' => '36118844720',
            'email' => 'raquelnicole_moura@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '20/02/1990',
            'id_loja' => 98
        ]);
        Cliente::create([
            'id' => 6748,
            'nome' => 'Kauê Bryan Souza',
            'cpf_cnpj' => '55782338806',
            'email' => 'kauesouza@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '27/06/1945',
            'id_loja' => 90
        ]);
        Cliente::create([
            'id' => 6872,
            'nome' => 'Samuel Emanuel Castro',
            'cpf_cnpj' => '85673855800',
            'email' => 'samuel.castro@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '05/11/1988',
            'id_loja' => 115
        ]);
        Cliente::create([
            'id' => 8796,
            'nome' => 'Emanuelly Alice Alessandra de Paula',
            'cpf_cnpj' => '96446953722',
            'email' => 'emanuellyalice@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '18/01/1988',
            'id_loja' => 90
        ]);
        Cliente::create([
            'id' => 9484,
            'nome' => 'Kevin Yuri Pedro Lopes',
            'cpf_cnpj' => '95829123088',
            'email' => 'kevinpedro@ecompleto.com.br',
            'tipo_pessoa' => 'F',
            'data_nasc' => '03/06/1996',
            'id_loja' => 94
        ]);
    }
}
