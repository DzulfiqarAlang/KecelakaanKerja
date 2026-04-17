<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
        }

        .kop {
            text-align: center;
            line-height: 1.4;
        }

        .kop h2 {
            margin: 0;
        }

        .kop p {
            margin: 2px 0;
        }

        hr {
            border: 1px solid black;
            margin: 10px 0 20px 0;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            font-weight: bold;
        }

        .foto img {
            width: 80px;
        }

        .ttd {
            margin-top: 40px;
            width: 100%;
        }

        .ttd td {
            border: none;
        }

        .right {
            text-align: right;
        }

        .nama-ttd {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- KOP SURAT -->
    <div class="kop">
        <h2>Warehouse Telkom Witel Kudus</h2>
        <p>Jl. Raya Pati - Kudus, Jati, Golantepus, Kec. Mejobo</p>
        <p>Kabupaten Kudus, Jawa Tengah 59381</p>
    </div>

    <hr>

    <!-- JUDUL -->
    <div class="judul">
        DATA KECELAKAAN ARSIP TAHUN {{ $year ?? date('Y') }}
    </div>

    <!-- TABEL DATA -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Teknisi</th>
                <th>Lokasi Kecelakaan</th>
                <th>Deskripsi Kecelakaan</th>
                <th>Tanggal</th>
                <th>Bukti Kecelakaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kerjas as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                <td class="foto">
                   @if($item->fotoBase64)
                   <img src="{{ $item->fotoBase64 }}" width="80">
                   @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
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
