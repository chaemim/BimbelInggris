@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Selamat Datang {{ Auth::user()->name }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (Auth::user()->roles_id == 2)
                        Silahkan lakukan pendaftaran dimenu <a href="/pendaftaran">pendaftaran</a>.<br>
                        Jika anda sudah mendaftar lakukan pembayaran dimenu <a href="/user/pembayaran">pembayaran</a>.
                    @endif

                    @if (Auth::user()->roles_id == 1)
                        Selamat Datang di halaman home admin.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title')
    Beranda
@endsection
