@extends('layouts.layout')

@section('content')
<form action="{{route('jadwal.store')}}" method="POST">
    @csrf
    <fieldset>
        <legend>Input Data Jadwal</legend>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="nama">Tanggal</label>
                <input id="nama" type="date" name="tanggal" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="nama">Jam</label>
                <input id="nama" type="time" name="jam" class="form-control">
            </div>
        </div>
        <!-- <div class="form-group row">
            <div class="col-md-6">
                <label for="nama">Nama Kelas</label>
                <input id="nama" type="text" name="nama_kelas" class="form-control">
            </div>
        </div> -->
       
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Simpan">
            <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
        </div>
        <hr>
    </fieldset>
</form>
@endsection
