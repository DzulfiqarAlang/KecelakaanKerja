<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    <style>
        body{
            font-family: "Times New Roman", serif;
            font-size: 12px;
        }

        .kop{
            text-align: center;
            line-height: 1.3;
        }

        .kop h2{
            margin: 0;
            font-size: 16px;
        }

        .kop p{
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

        th, td{
            border: 1px solid black;
            padding: 6px;
            vertical-align: middle;
        }

        th{
            background-color: #dcdcdc;
            text-align: center;
        }

        .center{
            text-align: center;
        }

        .foto img{
            width: 110px;
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

        .nama{
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- KOP SURAT -->
    <div class="kop">
        <h2>PT. TELKOM AKSES WITEL KUDUS</h2>
        <p>Jl. Raya Pati - Kudus, Jati, Golantepus, Kec. Mejobo, Kudus, Jawa Tengah</p>
    </div>

    <hr>

    <!-- JUDUL -->
    <div class="judul">
        DATA KECELAKAAN KERJA TAHUN {{ $year }}
    </div>

    <!-- TABEL DATA -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nama Teknisi</th>
                <th width="15%">Lokasi Kecelakaan</th>
                <th width="30%">Deskripsi Kecelakaan</th>
                <th width="10%">Tanggal</th>
                <th width="25%">Bukti Kecelakaan</th>
            </tr>
        </thead>

        <tbody>
        @foreach($kerjas as $index => $item)
            <tr>
                <td class="center">{{ $index + 1 }}</td>
                <td class="center">{{ $item->nama }}</td>
                <td class="center">{{ $item->lokasi }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td class="center">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}
                </td>
                <td class="center foto">
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
                Mengetahui,<br><br><br><br>

                <div class="nama">
                    Endrik Sulistiawan
                </div>
            </td>
        </tr>
    </table>

</body>
</html>
