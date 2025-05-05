<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MADUKONCER | Laporan</title>
  <style>
    img{
      height: 100px;;
    }

    hr.solid {
    border-top: 2px solid #4a4a4a;
    }
  </style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="title text-center mb-5">
      <h3>LAPORAN PENGADUAN MASYARAKAT</h3>
      <h5>DINAS PERINDUSTRIAN DAN PERDAGANGAN KABUPATEN PAMEKASAN</h5>
      <h7><a href="https://disperindag.pamekasankab.go.id/" target="_blank">disperindag.pamekasankab.go.id</a></h7>
    </div>
    <hr class="solid">

    <div>
      <h6>Laporan Pengaduan</h6>
      <h6>{{ $pengaduan->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY - HH:mm:ss') }}</h6>
    </div>
    <hr class="solid">

    <div class="mt-3 mb-3">
      <h6>Nama : {{ $pengaduan->name }}</h6>
      <h6>Alamat : {{ $pengaduan->user_alamat }}</h6>
      <h6>No. Telepon : {{ $pengaduan->phone }}</h6>
    </div>

    <!-- Lokasi Kejadian -->
    <div class="mt-3">
      <h6>Lokasi Kejadian: {{ $pengaduan->lokasi_kejadian }}</h6>
    </div>

    <!-- Keterangan Tambahan -->
    <div class="mt-3">
      <h6>Keterangan Tambahan: {{ $pengaduan->keterangan_tambahan ?? 'Tidak ada keterangan tambahan' }}</h6>
    </div>

    <table class="table table-bordered">
      <thead class="thead">
        <tr>
          <th scope="col">Laporan Pengaduan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <td>{{ $pengaduan->description }}</td>
        <td>{{ $pengaduan->status }}</td>
      </tbody>
    </table>
  </div>
</body>
</html>
