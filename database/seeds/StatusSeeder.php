<?php

namespace Database\Seeders;

use App\CartStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CartStatus::create([
            'id' => CartStatus::IN_PROGRESS,
            'name' => 'En progreso'
        ]);

        CartStatus::create([
            'id' => CartStatus::PAYMENT_SUCCESSFUL,
            'name' => 'Pago correcto'
        ]);

        CartStatus::create([
            'id' => CartStatus::PAYMENT_ERROR,
            'name' => 'Error en el pago'
        ]);

        CartStatus::create([
            'id' => CartStatus::ABANDONED,
            'name' => 'Abandonado'
        ]);
    }
}
