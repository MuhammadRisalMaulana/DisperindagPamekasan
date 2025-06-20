@extends('layouts.app') {{-- Atau layout yang kamu pakai --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-green-700 mb-4">{{ $item->judul }}</h1>
    <p class="text-sm text-gray-500 mb-4">Diterbitkan pada {{ $item->created_at->format('d M Y') }}</p>

    @if ($item->gambar)
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="mb-6 w-full rounded-lg">
    @endif

    <div class="text-gray-800 leading-relaxed">
        {!! $item->keterangan !!}
    </div>
</div>
@endsection
