<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    //
    protected $table = "jurusan";
    protected $fillable = ["kode", "nama_jurusan"];

    // public function mahasiswas()
    // {
    //     return $this->hasMany(Mahasiswa::class);
    // }
}
