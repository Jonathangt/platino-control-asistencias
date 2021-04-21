<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Chiang',
            'code_empleado' => '7358',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Jose Morales',
            'code_empleado' => '1285',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'David Alvario',
            'code_empleado' => '1953',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Ruben Ceron',
            'code_empleado' => '4685',
            'password' => bcrypt('12345678'),
        ]);
    }
}
