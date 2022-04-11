<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kas Masjid Al Fath</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: rgb(19, 110, 170);
            color: white;
        }
        tr:hover {background-color: #f5f5f5;}
        .title{
            text-align: center;
        }
    </style>
</head>
<body>
<h2 class="title">LAPORAN KAS MASJID AL FATH</h2>
<table>
    <tr>
        <th>Tipe</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Nominal</th>
        <th>Saldo Akhir</th>
    </tr>
    @foreach($data as $dt)
        <tr>
            <td>{{$dt->jenis_catatan}}</td>
            <td>{{$dt->tanggal_transaksi}}</td>
            <td>{{$dt->keterangan}}</td>
            <td>Rp. {{number_format($dt->nominal, 2)}}</td>
            <td>Rp. {{number_format($dt->saldo, 2)}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
