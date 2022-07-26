<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $creationData = array_map(fn ($role) => ['title' => $role], array_values(config('constants.roles')));

        $roles = Role::factory()->createMany($creationData);

        User::factory()->createMany([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role' => $roles->first()->title,
            ],
            [
                'name' => 'test',
                'email' => 'test@example.com',
                'password' => Hash::make('test'),
                'role' => $roles->last()->title,
            ],
        ]);
    }
}
