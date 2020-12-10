@extends('layouts.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
</div>
<hr>
<div class="card-header py-3" align="right">
    <a href="{{route('kelas.create')}}" class="d-sm-inlineblock btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah </a>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>Kode Akun</th>
                        <th>Nama Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $kelas)
                    <tr>
                        <td>{{$kelas->id}}</td>
                        <td>{{$kelas->nama_kelas}}</td>
                        <td align="center">
                            <a href="{{route( 'kelas.edit' ,[$kelas->id])}}"
                                class="dnone d-sm-inline-block btn btn-xs btn-success shadow-sm">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                            </a>
                            <a href="/kelas/hapus/{{ $kelas->id }}" onclick="return confirm('Yakin Ingin menghapus data?')"
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
