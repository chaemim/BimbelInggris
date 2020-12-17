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
                <div class="card-header">Pembayaran</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (isset($pemesanan))
                    <p>Nama  : {{Auth::user()->name}}</p>
                    <p>Kelas : {{$pemesanan->nama_kelas}}</p>
                    <p>Jadwal : {{$pemesanan->hari}}, {{date('d-M-Y', strtotime($pemesanan->tanggal))}} | {{$pemesanan->jam}}</p>
                    {{-- <p>Jam  : {{$pemesanan->jam}}</p> --}}
                    <p>Kode Pembayaran : {{$pemesanan->kodepembayaran}}</p>
                    <p>Total harus dibayar : <b>Rp. {{$pemesanan->total}} </b></p>
                    <p>Status :
                    @if ($pemesanan->is_bayar == 0)
                    <span class="badge badge-danger">Anda belum membayar</span> <br><br>
                    @elseif($pemesanan->is_bayar == 1 && $pemesanan->verif_id == 0)
                    <span class="badge badge-warning">Menunggu Konfirmasi Pembayaran</span> <br><br>
                    @elseif($pemesanan->is_bayar == 1  && $pemesanan->verif_id == 1)
                    <span class="badge badge-primary">Pembayaran Sudah dikonfirmasi</span> <br><br>
                    @endif
                    </p>

                    @if ($pemesanan->is_bayar == 1  && $pemesanan->verif_id == 1)
                        <a href="/user/pembayaran/cetak" target="__blank" class="btn btn-sm btn-primary"><span class="fa fa-print"></span> Cetak invoice</a>
                    @endif

                     @if ($pemesanan->is_bayar == 0)
                    <p>
                        <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Metode Pembayaran
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body bank">
                            <small>Silahkan lakukan pembayaran ke rekening dibawah ini:</small>
                            <p> <img src="{{asset('/home/images/Bri.png')}}" alt="" width="30px">
                                <b>BANK BRI</b></p>
                            <p>Nama Pemilik : PT. ENGLISH COURSE BIMBEL</p>
                            <p>No Rekening  : 034 101 000 743 303</p>
                            <hr>
                            <p><img src="{{asset('/home/images/bni.png')}}" alt="" width="30px">
                                <b>BANK BNI</b></p>
                            <p>Nama Pemilik : PT. ENGLISH COURSE BIMBEL</p>
                            <p>No Rekening  : 023 827 2088</p>
                            <hr>
                            <p><img src="{{asset('/home/images/mandiri.png')}}" alt="" width="40px">
                                <b>BANK MANDIRI</b></p>
                            <p>Nama Pemilik : PT. ENGLISH COURSE BIMBEL</p>
                            <p>No Rekening  : 0700 000 899 922</p>
                            <hr>
                            <p><img src="{{asset('/home/images/bca.png')}}" alt="" width="30px">
                                <b>BANK BCA</b></p>
                            <p>Nama Pemilik : PT. ENGLISH COURSE BIMBEL</p>
                            <p>No Rekening  : 731 025 2577</p>
                        </div>
                    </div> <br>
                    @endif

                    @if ($pemesanan->is_bayar == 0)
                    <small>Jika anda sudah membayar, lakukan konfirmasi dibawah ini disertai bukti transfer.</small> <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Konfirmasi Pembayaran
                    </button>
                    @elseif($pemesanan->is_bayar == 1 && $pemesanan->verif_id = 0)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihatbuktipembayaran">
                    Lihat Bukti Pembayaran
                    </button>
                    @endif

                    @else
                    <p>Anda belum mendaftar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($pemesanan))
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{asset('/user/konfirmasipembayaran/'. $pemesanan->id_bayar)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <div class="form-group row">
                    <div class="col-md-8">
                        <label for="nama">Upload bukti pembayaran</label>
                        <input id="nama" type="file" name="bukti_pembayaran" class="form-control">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-send" value="Simpan">
            <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Lihat Bukti-->
<div class="modal fade" id="lihatbuktipembayaran" tabindex="-1" role="dialog" aria-labelledby="lihatbuktipembayaran" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{asset('/media/image/' . $pemesanan->bukti_pembayaran)}}" alt="" width="300px">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endif

@endsection


@section('title')
    Pembayaran
@endsection


@section('css')
    <style>
        p{
            margin-bottom: 3px;
        }
        .bank>p{
            margin-bottom: 0px;
        }
    </style>
@endsection
