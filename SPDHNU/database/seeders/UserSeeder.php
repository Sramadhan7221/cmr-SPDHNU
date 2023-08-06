<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Wilayah;
use App\Models\UserLembaga;
use App\Models\RegisterUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'nama_mwc' => "MWC NU {$item->nama}",
                'kecamatan' => $item->kode
            ]);

            UserLembaga::query()->create([
                'user_nik' => $item->kode,
            ]);
        }
    }
}
