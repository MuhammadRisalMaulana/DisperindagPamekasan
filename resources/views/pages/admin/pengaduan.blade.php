<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan Pengaduan | DISPERINDAG PAMEKASAN</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9fbfc;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 960px;
      margin: 0 auto;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px 40px;
      border-radius: 8px;
    }

    .title {
      text-align: center;
      margin-bottom: 30px;
      color: #2c3e50;
    }

    .title h4 {
      margin-bottom: 5px;
      font-weight: 700;
      font-size: 1.8rem;
    }

    .title h5 {
      margin: 0;
      font-weight: 500;
      font-size: 1.1rem;
      color: #34495e;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    thead tr {
      background-color: #2980b9;
      color: white;
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      font-size: 14px;
      vertical-align: middle;
    }

    th {
      text-align: center;
      font-weight: 600;
    }

    tbody tr:nth-child(even) {
      background-color: #f2f6fc;
    }

    tbody tr:hover {
      background-color: #d0e4ff;
      transition: background-color 0.3s ease;
    }

    td.text-center {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="title">
      <h4>LAPORAN DATA PENGADUAN MASYARAKAT</h4>
      <h5>DINAS PERINDUSTRIAN DAN PERDAGANGAN</h5>
      <h5>KABUPATEN PAMEKASAN</h5>
    </div>

    <table>
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
          <td class="text-center">{{ ucfirst($item->status) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>