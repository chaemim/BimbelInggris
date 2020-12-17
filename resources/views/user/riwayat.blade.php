@extends('layouts.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Pendaftaran</h1>
</div>
<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Kode Pembayaran</th>
                        <th>Biaya</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        ?>
                    @foreach ($riwayat as $riwayat)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$riwayat->kodepembayaran}}</td>
                        <td>Rp. {{$riwayat->total}}</td>
                        <td><a href="{{asset('/user/riwayat/detail/'. $riwayat->id_pesan)}}" class="btn btn-sm btn-success">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('title')
    Riwayat Pendaftaran
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
