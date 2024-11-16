<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Roles
        $adminRole = Role::create(['name' => 'Administrador']);
        $doctorRole = Role::create(['name' => 'Medico']);
        $patientRole = Role::create(['name' => 'Paciente']);

        // Crear Permisos
        $permissions = [
            'view-all-appointments',
            'create-edit-delete-users',
            'manage-doctor-availability',
            'view-own-appointments',
            'create-appointments',
            'view-own-cita-history',
            'update-own-cita-status',
            'view-own-patients-history',
            'filter-appointments',
            'update-cita-status',
            'manage-cita',
            'view-own-availability',
            'view-all-users',
            'view-all-patients-history',
        ];

        // Crear todos los permisos
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a Roles

        // Administrador tiene todos los permisos
        $adminRole->givePermissionTo($permissions);

        // Médico tiene permisos limitados
        $doctorRole->givePermissionTo([
            'view-own-appointments',
            'view-own-patients-history',
            'update-own-cita-status',
            'view-own-availability',
            'filter-appointments',
            'view-own-cita-history'
        ]);

        // Paciente tiene permisos limitados
        $patientRole->givePermissionTo([
            'view-own-appointments',
            'create-appointments',
            'view-own-cita-history'
        ]);
    }
}
