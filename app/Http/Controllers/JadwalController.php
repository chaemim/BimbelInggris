<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = \App\Jadwal::All();
        return view( 'jadwal.jadwal' , ['jadwal' => $jadwal]);
    }

    public function create()
    {
        return view('jadwal.input');
    }

    public function store(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        // $hari = Carbon::now()->isoFormat('dddd');
        $hari = \Carbon\Carbon::parse( $request->tanggal )->isoFormat('dddd');

        //Menyimpan data kedalam tabel
        $save_jadwal = new \App\Jadwal;
        $save_jadwal->tanggal=$request->get('tanggal');
        $save_jadwal->jam=$request->get('jam');
        $save_jadwal->hari=$hari;
        $save_jadwal->save();
        return redirect()->route( 'jadwal.index' );
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $jadwal_edit = \App\Jadwal::findOrFail($id);
        return view( 'jadwal.edit' , ['jadwal' => $jadwal_edit]);
    }

  
    public function update(Request $request, $id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        // $hari = Carbon::now()->isoFormat('dddd');
        $hari = \Carbon\Carbon::parse( $request->tanggal )->isoFormat('dddd');

        $jadwal = \App\Jadwal::findOrFail($id);
        $jadwal->tanggal=$request->get('tanggal');
        $jadwal->jam=$request->get('jam');
        $jadwal->hari=$hari;
        $jadwal->save();
        return redirect()->route( 'jadwal.index');
    }

  
    public function destroy($id)
    {
        $jadwal = \App\Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route( 'jadwal.index');
    }
}
