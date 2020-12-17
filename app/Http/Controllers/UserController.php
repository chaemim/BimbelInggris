<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
         $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
            ->select('pemesanan.*', 'pembayaran.*' , 'kelas.nama_kelas' , 'users.*' , 'jadwal.*' , 'pembayaran.id as id_bayar' , 'pemesanan.id as id_pesan')
            ->get();
        return view('user.user' , compact('user' , 'pemesanan'));
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
