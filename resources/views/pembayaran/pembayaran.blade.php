@extends('layouts.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
</div>
<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>Id</th>
                        <th>Kode Pembayaran</th>
                        <th>Aksi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $pembayaran)
                    <tr>
                        <td>{{$pembayaran->id}}</td>
                        <td>{{$pembayaran->kodepembayaran}}</td>
                        {{-- <td>{{$pembayaran->tanggal}}</td> --}}
                        <td align="center">

                            @if ($pembayaran->verif_id == 0 && $pembayaran->is_bayar == 1)
                            <a href="{{asset('/konfirmasipembayaran/' . $pembayaran->id)}}"
                                class="btn btn-sm btn-primary">
                                <i class="fas fa-check fa-sm text-white-50"></i> Konfirmasi
                            </a>
                            @elseif($pembayaran->verif_id == 0 && $pembayaran->is_bayar == 0)
                            <span class="badge badge-pill badge-warning">Belum membayar</span>
                            @elseif($pembayaran->verif_id == 1 && $pembayaran->is_bayar == 1)
                            <span class="badge badge-pill badge-success">Sudah dikonfirmasi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{asset('pembayaran/detail/' . $pembayaran->id)}}" class="btn btn-sm btn-info">Detail</a>
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
    Pembayaran
@endsection

@section('script')
    <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>
   <script>
       $('#dataTable').DataTable({
            "order": [[ 3, "desc" ]], //or asc
            "columnDefs" : [{"targets":3, "type":"date-eu"}],
        });
   </script>
@endsection
