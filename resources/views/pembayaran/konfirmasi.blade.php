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
                <div class="card-header">Konfirmasi Pembayaran</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (isset($pembayaran))
                    <p>Nama  : {{$pembayaran->name}}</p>
                    <p>Kelas : {{$pembayaran->nama_kelas}}</p>
                    <p>Jadwal : {{$pembayaran->hari}}, {{date('d-M-Y', strtotime($pembayaran->tanggal))}} | {{$pembayaran->jam}}</p>
                    {{-- <p>Jam  : {{$pembayaran->jam}}</p> --}}
                    <p>Kode Pembayaran : {{$pembayaran->kodepembayaran}}</p>
                    <p>Total : <b>Rp. {{$pembayaran->total}} </b></p>

                    <p>Bukti Pembayaran : </p>
                    <img src="{{asset('/media/image/' .  $pembayaran->bukti_pembayaran)}}" alt="" width="500px">
                    <br><br>


                    <a href="{{asset('/konfirmasi/' . $id->id)}}"  class="btn btn-primary">Konfirmasi Pembayaran</a>


                    @else
                    <p>Anda belum mendaftar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('title')
    Konfirmasi Pembayaran
@endsection
