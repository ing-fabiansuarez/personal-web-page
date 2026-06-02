<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@archfoundry.test',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $student = User::factory()->create([
            'name' => 'Estudiante',
            'email' => 'estudiante@archfoundry.test',
            'password' => bcrypt('password'),
        ]);
        $student->assignRole('estudiante');
    }
}
