<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan Pengaduan | DISPERINDAG PAMEKASAN</title>
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous" />
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      background-color: #fff;
      color: #000;
    }

    .title {
      text-align: center;
      margin-bottom: 30px;
    }

    .title h4,
    .title h5 {
      margin: 0;
      padding: 3px 0;
    }

    .table th {
      background-color: #e0e0e0;
      text-align: center;
    }

    .table td,
    .table th {
      font-size: 14px;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="container mt-4">
    <div class="title">
      <h4><strong>LAPORAN DATA PENGADUAN MASYARAKAT</strong></h4>
      <h5>DINAS PERINDUSTRIAN DAN PERDAGANGAN</h5>
      <h5>KABUPATEN PAMEKASAN</h5>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Pengaduan</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pengaduan as $item)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->user_alamat }}</td>
          <td>{{ $item->description }}</td>
          <td>{{ $item->created_at->locale('id')->isoFormat('D MMMM YYYY, HH:mm') }}</td>
          <td>{{ ucfirst($item->status) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
