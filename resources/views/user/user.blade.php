@extends('layouts.layout')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
</div>
<hr>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        ?>
                    @foreach ($user as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->alamat}}</td>
                        <td><a class="btn btn-sm btn-success" data-toggle="collapse"
                                href="#data{{$user->id}}"><span class="fa fa-chevron-down"></span> Detail Transaksi</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="collapse" id="data{{$user->id}}">
                                <div class="card card-body">

                                    <table class="table tablebordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Kode Pembayaran</th>
                                                <th>Tanggal</th>
                                                <th>Biaya</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 1;
                                            ?>
                                            @foreach ($pemesanan->where('id_user' , $user->id) as $p)
                                            <tr>
                                                <td>{{$nomor++}}</td>
                                                <td>{{$p->kodepembayaran}}</td>
                                                <td>{{$p->tanggal}}</td>
                                                <td>Rp. {{$p->total}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
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
Data User
@endsection

@section('script')
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>
<script>
    $('#dataTable').DataTable({
        "order": [
            [3, "desc"]
        ], //or asc
        "columnDefs": [{
            "targets": 3,
            "type": "date-eu"
        }],
    });

</script>
@endsection
