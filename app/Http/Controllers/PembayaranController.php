<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Pembayaran;
use DB;
use Auth;

class PembayaranController extends Controller
{

    public function index()
    {
        // $pembayaran = Pembayaran::orderby('created_at' , 'desc')->get();
         $pembayaran = DB::table('pembayaran')
            ->join('pemesanan', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->select('pemesanan.*', 'pembayaran.*')
            ->orderBy('id_pemesanan', 'Desc')
            ->get();

        return view('pembayaran.pembayaran' , compact('pembayaran'));
    }

    public function konfirmasibayar($id)
    {
        $pembayaran = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
        ->join('users', 'users.id', '=', 'pemesanan.id_user')
        ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
        ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
        ->select('pemesanan.*', 'pembayaran.*' , 'users.*' , 'kelas.nama_kelas' , 'jadwal.*')
        ->where('pembayaran.id' , $id)
        ->first();
        // dd($pembayaran);

        $id = Pembayaran::where('id' , $id)->first();
        return view('pembayaran.konfirmasi' , compact('pembayaran' , 'id'));
    }

    public function konfirmasi($id)
    {
        Pembayaran::where('id' , $id)->update([
            'verif_id' => 1
        ]);

        Session::flash('success_message','Konfirmasi Selesai.');
        return redirect('/pembayaran');
    }

    public function detailbayar($id)
    {
        $pembayaran = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
        ->join('users', 'users.id', '=', 'pemesanan.id_user')
        ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
        ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
        ->select('pemesanan.*', 'pembayaran.*' , 'users.*' , 'kelas.nama_kelas' , 'jadwal.*')
        ->where('pembayaran.id' , $id)
        ->first();
        // dd($pembayaran);

        $id = Pembayaran::where('id' , $id)->first();
        return view('pembayaran.detail' , compact('pembayaran' , 'id'));
    }


}
