<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nombre' => 'Vitae Natural Nutrition',
            'direccion' => 'Montmeló',
            'cif' => '123456789L',
            'email' => 'info@vitae.es'
        ]);

        // Utilizar el factory para crear 10 clientes
        Cliente::factory(10)->create();
    }
}
