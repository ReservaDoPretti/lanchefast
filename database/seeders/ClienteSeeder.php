<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome'=> 'Cliente1',
            'endereco' => 'Rua aa 1,2',
            'telefone' => '11999999999',
            'cpf' => '12345678911',
            'email' => 'cliente@example.com',
            'senha' => bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome'=> 'Cliente2',
            'endereco' => 'Rua ab 1,3',
            'telefone' => '11999999977',
            'cpf' => '12345678900',
            'email' => 'cliente1@example.com',
            'senha' => bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome'=> 'Cliente3',
            'endereco' => 'Rua ac 1,4',
            'telefone' => '11999999933',
            'cpf' => '12345678933',
            'email' => 'cliente2@example.com',
            'senha' => bcrypt('senha123'),
        ]);
    }
}
