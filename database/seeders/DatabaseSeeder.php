<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class); // Llamamos al seeder de roles y permisos

        // Crear o actualizar usuarios con una contraseña conocida (en producción usar contraseñas seguras)
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'), // Contraseña conocida
            ]
        );

        $medicoUser = User::updateOrCreate(
            ['email' => 'medico@example.com'],
            [
                'name' => 'Doctor User',
                'password' => Hash::make('password123'), // Contraseña conocida
            ]
        );

        $pacienteUser = User::updateOrCreate(
            ['email' => 'paciente@example.com'],
            [
                'name' => 'Paciente User',
                'password' => Hash::make('password123'), // Contraseña conocida
            ]
        );

        // Asignar roles a los usuarios solo si no tienen uno asignado aún
        if ($adminUser->roles->isEmpty()) {
            $adminUser->assignRole('Administrador');
        }

        if ($medicoUser->roles->isEmpty()) {
            $medicoUser->assignRole('Medico');
        }

        if ($pacienteUser->roles->isEmpty()) {
            $pacienteUser->assignRole('Paciente');
        }
    }
}
