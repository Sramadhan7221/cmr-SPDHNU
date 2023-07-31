<?php

namespace Database\Seeders;

use App\Models\RegisterUser;
use App\Models\Role;
use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = Wilayah::getKecamatan();
        $role = Role::where('name', 'User')->first();

        foreach ($kecamatan as $key => $item) {
            RegisterUser::query()->create([
                'role_id' => $role->role_id,
                'email' => strtolower("{$item->nama}@mwcnu.com"),
                'nik' => $item->kode,
                'nama' => "Admin MWC {$item->nama}",
                'password' => "mwcNu@{$item->kode}",
                'nama_mwc' => "MWC {$item->nama}",
                'kecamatan' => $item->kode
            ]);
        }
    }
}
