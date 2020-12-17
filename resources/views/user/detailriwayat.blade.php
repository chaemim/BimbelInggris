@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

             @if(Session::has('success_message'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          {{Session::get('success_message')}}
                      </div>
                  @endif
                   @if(Session::has('danger_message'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          {{Session::get('danger_message')}}
                      </div>
                  @endif

            <div class="card">
                <div class="card-header">Detail Riwayat</div>
                <div class="card-body">

                    <p>Nama  : {{$pemesanan->name}}</p>
                    <p>Email : {{$pemesanan->email}}</p>
                    <p>Kelas : {{$pemesanan->nama_kelas}}</p>
                    <p>Jadwal : {{$pemesanan->hari}}, {{date('d-M-Y', strtotime($pemesanan->tanggal))}} | {{$pemesanan->jam}}</p>
                    {{-- <p>Jam  : {{$pemesanan->jam}}</p> --}}
                    <p>Kode Pembayaran : {{$pemesanan->kodepembayaran}}</p>
                    <p>Total : <b>Rp. {{$pemesanan->total}} </b></p>
                    @if ($pemesanan->is_bayar == 0)
                    <span class="badge badge-danger">Anda belum membayar</span> <br><br>
                    @elseif($pemesanan->is_bayar == 1 && $pemesanan->verif_id == 0)
                    <span class="badge badge-warning">Menunggu Konfirmasi Pembayaran</span> <br><br>
                    @elseif($pemesanan->is_bayar == 1  && $pemesanan->verif_id == 1)
                    <span class="badge badge-primary">Pembayaran Sudah dikonfirmasi</span> <br><br>
                    @endif

                    <div class="offset-md-11">
                        <a href="{{asset('/user/riwayat')}}" class="btn btn-sm btn-info"><span class="fa fa-angle-left" aria-hidden="true"></span> Kembali</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('title')
    Detail Riwayat
@endsection


@section('css')
    <style>
        p{
            margin-bottom: 3px;
        }
    </style>
@endsection
