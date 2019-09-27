<?php

use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class jurusan_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // untuk yang single menggunakan Model::create()
        
        $jurusans = [
            [
                'kode' => 'AKT',
                'nama_jurusan' => 'Akuntansi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'PJK',
                'nama_jurusan' => 'Perpajakan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'MI',
                'nama_jurusan' => 'Manajemen Informatika',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Jurusan::insert($jurusans);
    }
}
