<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan namespace DB

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data ke tabel detail_profile
        DB::table('detail_profile')->insert([
            'address' => 'Jember',
            'nomor_tlp' => '08xxxxxx',
            'ttl' => '2004-11-05',
            'foto' => 'picture.png',
            // 'created_at' => now(), // Opsional: Menambahkan timestamp
            // 'updated_at' => now(),
        ]);
    }
}
