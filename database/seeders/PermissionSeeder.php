<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <-- Import User model
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions
        $permissions = [
            "role.view",
            "role.create",
            "role.edit",
            "role.delete",
            "Pwd",
            "SoloParent",
            "SeniorCitizen",
            "Aics",
        ];

        // Create permissions if not exist
        foreach ($permissions as $value) {
            Permission::firstOrCreate([
                'name' => $value,
                'guard_name' => 'web',
            ]);
        }

        // Create admin role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Change email if needed
            [
                'name' => 'Default Admin',
                'password' => Hash::make('Hello@@12'), // Change password if needed
            ]
        );

        // Assign admin role to default user
        $admin->assignRole($adminRole);
    }
}
