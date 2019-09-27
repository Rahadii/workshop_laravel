<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // tujuannya untuk si user yang bisa login untuk mengelola data
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'npm' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'alamat_asal' => 'required',
            'alamat_tinggal' => 'required',
            'jurusan' => 'required',
            'fakultas' => 'required',
            'no_hp' => 'required',
            'gender' => 'required',
            'angkatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required'
        ];
    }

    public function messages(){
        return [
            'npm.required' => ' NPM wajib diisi',
            'nama_depan.required' => ' Nama Depan wajib diisi',
            'nama_belakang.required' => ' Nama Belakang wajib diisi',
            'alamat_asal.required' => ' Alamat Asal wajib diisi',
            'alamat_tinggal.required' => ' Alamat Tinggal wajib diisi',
            'jurusan.required' => ' Jurusan wajib diisi',
            'fakultas.required' => ' Fakultas wajib diisi',
            'no_hp.required' => ' No HP wajib diisi',
            'gender.required' => ' Gender wajib dipilih',
            'angkatan.required' => ' Angkatan wajib diisi',
            'tempat_lahir.required' => ' Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => ' Tanggal Lahir wajib diisi',
            'agama.required' => ' Agama wajib diisi'
        ];
    }
}
