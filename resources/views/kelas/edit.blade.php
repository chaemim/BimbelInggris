@extends('layouts.layout')

@section('content')
<form action="{{route('kelas.update', [$kelas->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Edit Data Kelas</legend>
        <div class="form-group row">
            <div class="col-md-8">
                <label for="nama">Nama Kelas</label>
                <input id="nama" type="text" name="nama_kelas" class="form-control" value="{{$kelas->nama_kelas}}">
            </div>
        </div>
        <div class="col-md-10">
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <input type="Button" class="btn btn-primary btnsend" value="Kembali" onclick="history.go(-1)">
        </div>
        <hr>
    </fieldset>
</form>
@endsection

@section('title')
    Edit Data Kelas
@endsection
