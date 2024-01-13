<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('villages')->insert([
                [
                    'nama' => 'Desa Sukajadi',
                    'kode_pos' => '12345',
                    'kecamatan' => 'Kecamatan Sukajadi',
                    'kabupaten_kota' => 'Kota Bandung',
                ],
                [
                    'nama' => 'Desa Sukawarna',
                    'kode_pos' => '12346',
                    'kecamatan' => 'Kecamatan Sukawarna',
                    'kabupaten_kota' => 'Kota Bandung',
                ],
            ]);
        }
    }
}
