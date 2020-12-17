<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;
use Auth;
use App\Pemesanan;
use App\Pembayaran;
use Carbon\Carbon;

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
        $date = \Carbon\Carbon::now();
        return view('user.pendaftaran', compact('jadwal' , 'kelas' , 'date'));
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

        Session::flash('success_message','Pendaftaran selesai! Silahkan lakukan pembayaran secepatnya.');
        return redirect('/user/pembayaran');
    }

    public function bayar()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
            ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
            ->select('pemesanan.*', 'pembayaran.*' , 'kelas.nama_kelas' , 'jadwal.*' , 'pembayaran.id as id_bayar' , 'pemesanan.id as id_pesan')
            ->where('pemesanan.id_user' , '=' , Auth::user()->id)
            ->orderBy('pemesanan.created_at' , 'desc')
            ->first();
            // dd($pemesanan);
        // $pemesanan = Pemesanan::where('id_user' , Auth::user()->id)->latest();
        return view('user.pembayaran' , compact('pemesanan'));
    }

    public function cetakbayar()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
            ->select('pemesanan.*', 'pembayaran.*' , 'kelas.nama_kelas' , 'users.*' , 'jadwal.*' , 'pembayaran.id as id_bayar' , 'pemesanan.id as id_pesan')
            ->where('pemesanan.id_user' , '=' , Auth::user()->id)
            ->orderBy('pemesanan.created_at' , 'desc')
            ->first();
        $pdf = PDF::loadview('user.cetakbayar_pdf',['pemesanan'=>$pemesanan])->setPaper('A4','landscape');
            return $pdf->stream();
    }

    public function konfirmasibayar(Request $request, $id)
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $tanggal = \Carbon\Carbon::now();

        $filename = 'bukti-upload-' . time() . '.' .$request->file('bukti_pembayaran')->getClientOriginalExtension();
        $request->file('bukti_pembayaran')->move(
            base_path() . '/public/media/image', $filename
        );

        $pembayaran = Pembayaran::where('id' , $id)->first();
        // dd($pembayaran);

        Pembayaran::where('id' , $id)->update([
            'bukti_pembayaran' => $filename,
            'tanggal' => $tanggal,
        ]);

        Pemesanan::where('id' , $pembayaran->id_pemesanan)->update([
            'is_bayar' => 1
        ]);

        Session::flash('success_message','Konfirmasi pembayaran selesai! Silahkan tunggu konfirmasi pembayaran dari Admin');
        return redirect('/user/pembayaran');
    }

    public function riwayat()
    {
        $riwayat = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->select('pemesanan.*', 'pembayaran.*' , 'pembayaran.id as id_bayar' , 'pemesanan.id as id_pesan')
            ->where('pemesanan.id_user' , '=' , Auth::user()->id)
            ->orderBy('id_pemesanan', 'Desc')
            ->get();
        // dd($riwayat);
        return view('user.riwayat' , compact('riwayat'));
    }

    public function detailriwayat($id)
    {
        $pemesanan = DB::table('pemesanan')
            ->join('pembayaran', 'pemesanan.id', '=', 'pembayaran.id_pemesanan')
            ->join('users', 'users.id', '=', 'pemesanan.id_user')
            ->join('kelas', 'kelas.id', '=', 'pemesanan.id_kelas')
            ->join('jadwal', 'jadwal.id', '=', 'pemesanan.id_jadwal')
            ->select('pemesanan.*', 'pembayaran.*' , 'kelas.nama_kelas' , 'jadwal.*' , 'users.*' , 'pembayaran.id as id_bayar' , 'pemesanan.id as id_pesan')
            ->where('pemesanan.id' , '=' , $id)
            ->first();

        return view('user.detailriwayat' , compact('pemesanan'));
    }
}
