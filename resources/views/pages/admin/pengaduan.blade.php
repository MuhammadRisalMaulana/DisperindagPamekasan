<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laporan Pengaduan | DISPERINDAG PAMEKASAN</title>
  <style>
    @page {
      size: A4;
      margin: 30px 20px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 100%;
      padding: 10px 20px;
    }

    .title {
      text-align: center;
      margin-bottom: 10px;
    }

    .title h4 {
      margin: 0;
      font-weight: bold;
      font-size: 1.2rem;
    }

    .title h5 {
      margin: 2px 0;
      font-weight: normal;
      font-size: 0.95rem;
    }

    .timestamp {
      text-align: right;
      font-size: 11px;
      color: #666;
      margin-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      table-layout: fixed;
    }

    thead tr {
      background-color: #2980b9;
      color: white;
    }

    th, td {
      padding: 6px 8px;
      border: 1px solid #ccc;
      font-size: 11px;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    th {
      text-align: center;
    }

    td {
      vertical-align: top;
    }

    td:nth-child(4) {
      text-align: justify;
    }

    tbody tr:nth-child(even) {
      background-color: #f4f8fb;
    }

    .text-center {
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

    <div class="timestamp">
      Dicetak pada: {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y, HH:mm') }}
    </div>

    <table>
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th style="width: 15%;">Nama</th>
          <th style="width: 25%;">Alamat</th>
          <th style="width: 30%;">Pengaduan</th>
          <th style="width: 20%;">Tanggal</th>
          <th style="width: 15%;">Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pengaduan as $item)
        <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->user_alamat }}</td>
          <td>{{ $item->description }}</td>
          <td>{{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y, HH:mm') }}</td>
          <td class="text-center">{{ ucfirst($item->status) }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">Tidak ada data pengaduan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>

</html>
