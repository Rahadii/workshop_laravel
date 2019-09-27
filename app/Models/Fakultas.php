<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = ['kode','nama_fakultas'];

    // public function mahasiswas()
    // {
    //     return $this->hasMany(Mahasiswa::class);
    // }
}
