<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kejadian #{{ $kerja->id }}</title>

    <style>
        body{
            font-family: "Times New Roman", serif;
            font-size: 12px;
        }

        .header{
            text-align: center;
            line-height: 1.4;
        }

        .header h2{
            margin: 0;
        }

        .header p{
            margin: 2px 0;
            font-size: 11px;
        }

        hr{
            border: 1px solid black;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        .judul{
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        .table-detail td{
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        .label{
            width: 180px;
            font-weight: bold;
        }

        .foto{
            text-align: center;
        }

        .foto img{
            width: 200px;
        }

        .ttd{
            margin-top: 40px;
            width: 100%;
        }

        .ttd td{
            border: none;
        }

        .right{
            text-align: right;
        }

        .nama-ttd{
            margin-top: 70px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- KOP SURAT -->
    <div class="header">
        <h2>Warehouse Telkom Witel Kudus</h2>
        <p>Jl. Raya Pati - Kudus, Jati, Golantepus, Kec. Mejobo</p>
        <p>Kabupaten Kudus, Jawa Tengah 59381</p>
    </div>

    <hr>

    <!-- JUDUL -->
    <div class="judul">
        DETAIL LAPORAN KECELAKAAN
    </div>

    <!-- TABEL DATA -->
    <table class="table-detail">
        <tr>
            <td class="label">Nama Teknisi</td>
            <td>{{ $kerja->nama }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi Kecelakaan</td>
            <td>{{ $kerja->lokasi }}</td>
        </tr>
        <tr>
            <td class="label">Deskripsi Kecelakaan</td>
            <td>{{ $kerja->deskripsi }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal</td>
            <td>{{ \Carbon\Carbon::parse($kerja->tanggal)->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <td class="label">Bukti Kecelakaan</td>
            <td class="foto">
                @if($fotoBase64)
                <img src="{{ $fotoBase64 }}" style="width:200px;">
                @else
                Tidak ada foto
                @endif
            </td>
        </tr>
    </table>

    <!-- TANDA TANGAN -->
    <table class="ttd">
        <tr>
            <td></td>
            <td class="right">
                Kudus, {{ date('d-m-Y') }}<br><br>
                <b>Mengetahui,</b><br><br><br><br>
                <div class="nama-ttd">
                    Endrik Sulistiawan
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
