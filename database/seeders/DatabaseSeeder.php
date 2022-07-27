<?php

namespace Database\Seeders;

use App\Models\Setting;
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
        $rolesCreationData = array_map(fn ($role) => ['title' => $role], array_values(config('constants.roles')));

        $roles = Role::factory()->createMany($rolesCreationData);

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

        $settingsCreationData = array_map(
            fn ($setting) => [
                'title' => $setting['title'],
                'short_title' => $setting['short_title'],
                'value' => $setting['default']
            ],
            array_values(config('settings')),
        );

        Setting::factory()->createMany($settingsCreationData);
    }
}
