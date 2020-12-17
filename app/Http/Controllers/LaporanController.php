<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.laporan');
    }

    public function show(Request $request)
    {
        $periode=$request->get('periode');
        if($periode == 'All')
        {
            $pembayaran = \App\Pembayaran::All();
            $pdf = PDF::loadview('laporan.laporan_pdf',['pembayaran'=>$pembayaran])->setPaper('A4','landscape');
            return $pdf->stream();
        }
        elseif($periode == 'periode')
        {
            $tglawal=$request->get('tglawal');
            $tglakhir=$request->get('tglakhir');
            $pembayaran=DB::table('pembayaran')
            ->whereBetween('tanggal', [$tglawal,$tglakhir])
            ->orderby('tanggal','ASC')
            ->get();
            $pdf = PDF::loadview('laporan.laporan_pdf',['pembayaran'=>$pembayaran])->setPaper('A4','landscape');
            return $pdf->stream();
        }
    }
}
