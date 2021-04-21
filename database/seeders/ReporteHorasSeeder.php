<?php

namespace Database\Seeders;

use App\Models\ReporteHoras;
use App\Models\User;
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
        $get_user = User::where('name', 'Juan Chiang')->first();

        ReporteHoras::create([
            'id_user' => $get_user->id,
            'hora_entrada' => '08:08:20 AM',
            'estado_hora_entrada' => 0,
            'almuerzo_inicio' => '12:00:20 PM',
            'estado_almuerzo_inicio' => 0,
            'almuerzo_regreso' => '13:05:00 PM',
            'estado_almuerzo_regreso' => 0,
            'hora_salida' => '18:15:00 PM',
            'estado_hora_salida' => 0,
            'total_cumplimiento' => '09:02',
            'fecha_registro' => '2021-04-18 15:30:17',
        ]);

        $get_user = User::where('name', 'Jose Morales')->first();

        ReporteHoras::create([
            'id_user' => $get_user->id,
            'hora_entrada' => '08:28:20 AM',
            'estado_hora_entrada' => 0,
            'almuerzo_inicio' => '13:00:20 PM',
            'estado_almuerzo_inicio' => 0,
            'almuerzo_regreso' => '14:05:00 PM',
            'estado_almuerzo_regreso' => 0,
            'hora_salida' => '17:30:00 PM',
            'estado_hora_salida' => 0,
            'total_cumplimiento' => '09:57',
            'fecha_registro' => '2021-04-19 15:30:17',
        ]);

        $get_user = User::where('name', 'David Alvario')->first();

        ReporteHoras::create([
            'id_user' => $get_user->id,
            'hora_entrada' => '08:00:00 AM',
            'estado_hora_entrada' => 0,
            'almuerzo_inicio' => '12:00:00 PM',
            'estado_almuerzo_inicio' => 0,
            'almuerzo_regreso' => '13:00:00 PM',
            'estado_almuerzo_regreso' => 0,
            'hora_salida' => '17:00:00 PM',
            'estado_hora_salida' => 0,
            'total_cumplimiento' => '08:00',
            'fecha_registro' => '2021-04-20 15:30:17',
        ]);

        $get_user = User::where('name', 'Ruben Ceron')->first();

        ReporteHoras::create([
            'id_user' => $get_user->id,
            'hora_entrada' => '08:30:00 AM',
            'estado_hora_entrada' => 0,
            'almuerzo_inicio' => '12:00:00 PM',
            'estado_almuerzo_inicio' => 0,
            'almuerzo_regreso' => '13:15:00 PM',
            'estado_almuerzo_regreso' => 0,
            'hora_salida' => '17:15:00 PM',
            'estado_hora_salida' => 0,
            'total_cumplimiento' => '09:57',
            'fecha_registro' => '2021-04-21 15:30:17',
        ]);
    }
}
