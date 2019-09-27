<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.tambah_mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
        //
        DB::beginTransaction();
        try {

            $insert = Mahasiswa::create($request->all());
            if ( $insert ) {
                DB::commit();

                return redirect()->route('tambah_mahasiswa')->with('msg_berhasil', 'Data Berhasil Diinputkan');
            } else {
                DB::rollback();

                return redirect()->route('tambah_mahasiswa')->with('msg_gagal', 'Data Gagal Diinputkan');
            }
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('tambah_mahasiswa')->with('msg_error', 'Error : ' . $e->getMessage() . 'on File: ' . $e->getFile() . ' on Line ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mahasiswa = Mahasiswa::findOrfail($id);
        return view('mahasiswa.edit_mahasiswa', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();

            $mahasiswa_id = $id;
            $data = $request->except('_method','_token'); // untuk mengecualikan table yang ingin dipilih

            $save = Mahasiswa::where('id', $mahasiswa_id)
                ->update($data);
            
            $mahasiswa = Mahasiswa::find($id);

            if( $save ){
                DB::commit();

                return redirect()
                ->route('home')
                ->with('msgSuccessUpdate', 'ID : '.$mahasiswa->id. ' Berhasil diupdate !');
            }else{
                DB::rollBack();
                
                return redirect()
                    ->route('home')
                    ->with('msgFailedUpdate', 'ID : '.$mahasiswa->id. ' Gagal diupdate !');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $mahasiswa_id = $request->id;

            // dd($mahasiswa_id);
            $mahasiswa = Mahasiswa::findOrFail($mahasiswa_id);
            
            
            $delete = $mahasiswa->delete(); 

            if ( $delete  ) {
                DB::commit();

                return redirect()
                ->route('home')
                ->with('msgSuccessDelete', 'ID : '.$mahasiswa_id. ' Berhasil di Delete !');
            }else{
                DB::rollBack();
                
                return redirect()
                    ->route('home')
                    ->with('msgFailedDelete', 'ID : '.$mahasiswa_id. ' Gagal di Delete !');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
