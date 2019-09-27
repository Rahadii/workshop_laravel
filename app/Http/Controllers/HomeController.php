<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $mahasiswa = Mahasiswa::get();
        $mahasiswa = Mahasiswa::when($request->filter != '', function($q) use ($request) {
            $q->where($request->filter, $request->search);
        })
            ->get();

        return view('home', compact('mahasiswa'));
    }
}
