<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'shareid' => '114043',
            'nama' => 'Ignasius Hananto',
            'jeniskelamin' => 'Pria',
            'alamat' => 'Cicurug',
            'notelpon' => '085156704346',
        ]);
    }
}
