<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tarea;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Empleado::factory()->times(15)->create();
        Tarea::factory()->times(8)->create()->each(function($tarea){
            $tarea->empleados()->sync(
                Empleado::all()->random(1)
            );
            
        });

         

        \App\Models\User::factory()->create([
            'name' => 'FirstADMIN',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
