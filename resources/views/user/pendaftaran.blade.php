@extends('layouts.layout')

@section('content')
<form action="{{asset('/pendaftaran/store')}}" method="POST">
    @csrf
    <fieldset>
        <legend>Input Data pendaftaran</legend>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="kelas">Kelas</label>
                <select id="kelas" name="id_kelas" class="form-control">
                    <option value="">--Pilih kelas--</option>
                    @foreach($kelas as $kelas)
                    <option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="kelas">Jadwal</label>
                <select id="jadwal" name="id_jadwal" class="form-control">
                    <option value="">--Pilih Jadwal--</option>
                    @foreach($jadwal as $jadwal)
                    <option value="{{$jadwal->id}}"> {{$jadwal->hari}} | {{$jadwal->tanggal}} | {{$jadwal->jam}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="nama">Biaya</label>
                <input id="nama" type="text" name="tanggal" class="form-control" value="Rp.100.000" readonly>
            </div>
        </div>

        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Daftar">
            <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
        </div>
        <hr>
    </fieldset>
</form>
@endsection
