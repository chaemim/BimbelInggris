@extends('layouts.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jadwal</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <a href="{{route('jadwal.create')}}" class="d-sm-inlineblock btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah </a>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>Kode Jadwal</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $jadwal)
                    <tr>
                        <td>{{$jadwal->id}}</td>
                        <td>{{$jadwal->hari}}</td>
                        <td>{{$jadwal->tanggal}}</td>
                        <td>{{$jadwal->jam}}</td>
                        <td align="center">
                            <a href="{{route( 'jadwal.edit' ,[$jadwal->id])}}"
                                class="dnone d-sm-inline-block btn btn-xs btn-success shadow-sm">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                            </a>
                            <a href="/jadwal/hapus/{{ $jadwal->id }}" onclick="return confirm('Yakin Ingin menghapus data?')"
                                class="dnone d-sm-inline-block btn btn-xs btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('title')
    Jadwal
@endsection
