<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            line-height: 1.5;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h3 {
            margin: 0;
            color: #2c3e50;
        }

        .header h5 {
            margin: 5px 0;
            color: #34495e;
        }

        .header small a {
            color: #2980b9;
            text-decoration: none;
        }

        hr.solid {
            border-top: 2px solid #7f8c8d;
            margin: 10px 0;
        }

        .section-title {
            background-color: #f2f2f2;
            padding: 6px 10px;
            font-weight: bold;
            border-left: 4px solid #2980b9;
            margin-top: 20px;
        }

        .info {
            margin: 8px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #2980b9;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 13px;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: top;
        }

        img {
            max-height: 150px;
            max-width: 100%;
            object-fit: contain;
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="header">
        <h3>LAPORAN PENGADUAN MASYARAKAT</h3>
        <h5>DINAS PERINDUSTRIAN DAN PERDAGANGAN<br>KABUPATEN PAMEKASAN</h5>
        <small><a href="https://disperindag.pamekasankab.go.id/">disperindag.pamekasankab.go.id</a></small>
    </div>

    <hr class="solid">

    <div class="section-title">Informasi Waktu</div>
    <div class="info">Tanggal: {{ \Carbon\Carbon::parse($pengaduan->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss') }}</div>

    <div class="section-title">Data Pelapor</div>
    <div class="info">Nama: {{ $pengaduan->name }}</div>
    <div class="info">Alamat: {{ $pengaduan->user_alamat }}</div>
    <div class="info">No. Telepon: {{ $pengaduan->phone }}</div>

    <div class="section-title">Detail Pengaduan</div>
    <div class="info">Lokasi Kejadian: {{ $pengaduan->lokasi_kejadian }}</div>
    <div class="info">Keterangan Tambahan: {{ $pengaduan->keterangan_tambahan ?? 'Tidak ada keterangan tambahan' }}</div>

    <table>
        <thead>
            <tr>
                <th>Foto Pengaduan</th>
                <th>Deskripsi Pengaduan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @if($pengaduan->image)
                        <img src="{{ public_path('storage/' . $pengaduan->image) }}" alt="Foto Pengaduan">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ $pengaduan->description }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
