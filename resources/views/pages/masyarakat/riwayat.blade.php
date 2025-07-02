{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Riwayat Pengaduan</h2>
        
        @if($pengaduans->isEmpty())
            <p>Anda belum memiliki pengaduan yang diajukan.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduans as $pengaduan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengaduan->created_at->format('d-m-Y') }}</td>
                            <td>{{ $pengaduan->isi_pengaduan }}</td>
                            <td>{{ $pengaduan->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection --}}
