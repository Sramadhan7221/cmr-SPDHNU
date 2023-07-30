<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RegisterUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::query()->where('name', 'Admin')->first();
        RegisterUser::query()->create([
            'role_id' => $role->role_id,
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);
    }
}
