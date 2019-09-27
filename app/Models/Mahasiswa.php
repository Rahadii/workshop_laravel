<?php

namespace App\Models;

use App\Models\Jurusan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
    	"npm", "nama_depan", "nama_belakang", "alamat_asal", "alamat_tinggal", "jurusan", "fakultas", "no_hp", "gender", "angkatan", "tempat_lahir", "tanggal_lahir", "agama"
    ];

    public $appends = ['full_name']; // merujuk kepada asesor dan mutator dengan mengubah format penulisan dengan underscore

    // Asesor
    public function getFullNameAttribute(){
        return $this->nama_depan . ' ' . $this->nama_belakang; 
    }

    public function getTanggalDaftarAttribute(){
        return Carbon::parse($this->created_at)->format('Y-m-d'); 
    }

    // Mutator
    public function setNamaDepanAttribute($value){
        $this->attributes['nama_depan'] = $value;
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function Fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
