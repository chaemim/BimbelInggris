<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigi n="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
        #table th
            {
                text-align: center;
                vertical-align: middle;
            }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                {{-- <img src="{{ public_path('/home/images/logo3.jpg')}}" style="width:100%; max-width:300px;"> --}}
                <h2>Laporan Pendaftaran<br>English Course & Bimbel di Learning Education Center<br>(SIPSLEC)</h2>
                <hr>
            </td>
            </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center" id="table">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Kode Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pembayaran as $pembayaran)
            <tr align="center">
                <td>{{$i++}}</td>
                <td>{{$pembayaran->kodepembayaran}}</td>
                <td>{{$pembayaran->tanggal}}</td>
                <td>Rp. {{$pembayaran->total}}</td>
            </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td><b>TOTAL KESELURUHAN</b></td>
                <td><b>Rp. {{$pembayaran->sum('total')}}</b></td>
            </tr>
        </tbody>
    </table><br><br>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ Auth::user()->name }}</h6>
    </div>
</body>

</html>
