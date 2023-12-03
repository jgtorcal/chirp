<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Factura;

class FacturaSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilizar el factory para crear 10 clientes
        Factura::factory(10)->create();
    }
}
