<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = \App\Kelas::All();
        return view( 'kelas.kelas' , ['kelas' => $kelas]);
    }

    public function create()
    {
        return view('kelas.input');
    }

    public function store(Request $request)
    {
        //Menyimpan data kedalam tabel
        $save_kelas = new \App\Kelas;
        $save_kelas->nama_kelas=$request->get('nama_kelas');
        $save_kelas->save();
        return redirect()->route( 'kelas.index' );
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $kelas_edit = \App\Kelas::findOrFail($id);
        return view( 'kelas.edit' , ['kelas' => $kelas_edit]);
    }

  
    public function update(Request $request, $id)
    {
        $kelas = \App\Kelas::findOrFail($id);
        $kelas->nama_kelas=$request->get('nama_kelas');
        $kelas->save();
        return redirect()->route( 'kelas.index');
    }

  
    public function destroy($id)
    {
        $kelas = \App\Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route( 'kelas.index');
    }
}
