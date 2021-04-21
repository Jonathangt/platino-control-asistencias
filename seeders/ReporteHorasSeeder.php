<?php

namespace Database\Seeders;

use App\Models\ReporteHoras;
use Illuminate\Database\Seeder;

class ReporteHorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReporteHoras::create([
            'id_user' => '7358',
            'hora_entrada' => '8',
            'almuerzo_inicio' => '7358',
            'almuerzo_regreso' => '5',
            'hora_salida' => '10',
            'total_cumplimiento' => '40H',
            'fecha_registro' => date("Y-m-d"),
        ]);
    }
}
