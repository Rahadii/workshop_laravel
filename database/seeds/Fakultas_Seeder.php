<?php

use App\Models\Fakultas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Fakultas_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakultas = [
            [
                'kode' => 12,
                'nama_fakultas' => 'Keuangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 13,
                'nama_fakultas' => 'Bea Cukai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 14,
                'nama_fakultas' => 'Informatika',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Fakultas::insert($fakultas);
    }
}
