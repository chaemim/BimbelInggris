@extends('layouts.layout')

@section('content')
<form action="{{route('jadwal.update', [$jadwal->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Edit Data jadwal</legend>
        <div class="form-group row">
            <div class="col-md-8">
                <label for="nama">Tanggal</label>
                <input id="nama" type="date" name="tanggal" class="form-control" value="{{$jadwal->tanggal}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-8">
                <label for="nama">Jam</label>
                <input id="nama" type="time" name="jam" class="form-control" value="{{$jadwal->jam}}">
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
    Edit Data Jadwal
@endsection
