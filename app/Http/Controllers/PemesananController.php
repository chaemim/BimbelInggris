<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pemesanan;
use Auth;
use App\Pembayaran;
use DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar()
    {
        $jadwal = \App\Jadwal::All();
        $kelas = \App\Kelas::All();
        return view('user.pendaftaran', compact('jadwal' , 'kelas'));
    }

    public function daftarsimpan(Request $request)
    {
        Pemesanan::create([
            'id_kelas' =>  $request->id_kelas,
            'id_jadwal' => $request->id_jadwal,
            'id_user'   => Auth::user()->id
        ]);
        
        $kode = Str::random(5);
        $idpesan = Pemesanan::latest()->first();
        Pembayaran::create([
            'kodepembayaran' => 'ECB' . strtoupper($kode),
            'total' => 100000,
            'id_pemesanan' => $idpesan->id,
            'verif_id' => 0
        ]);
        return redirect('/pembayaranuser');
    }

    public function bayar()
    {   
        $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->select('pemesanan.*', 'pembayaran.*')
            ->where('pemesanan.id_user' , '=' , Auth::user()->id)
            ->orderBy('pemesanan.created_at' , 'desc')
            ->first(); 
            // dd($pemesanan);
        // $pemesanan = Pemesanan::where('id_user' , Auth::user()->id)->latest();
        return view('user.pembayaran' , compact('pemesanan'));
    }
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
