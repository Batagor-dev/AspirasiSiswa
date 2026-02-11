@extends('layouts.admin')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-700">
        Daftar Pengaduan
    </h2>
    <p class="text-gray-500">
        Kelola dan jawab laporan dari siswa
    </p>
</div>

@foreach($pengaduans as $p)

<div class="bg-white shadow-md border border-blue-100 rounded-2xl p-6 mb-5 hover:shadow-xl transition">

    <div class="flex justify-between items-start mb-2">
        <h3 class="font-semibold text-lg text-gray-800">
            {{ $p->judul }}
        </h3>

        <span class="text-xs px-3 py-1 rounded-full
            {{ $p->status == 'selesai'
                ? 'bg-green-100 text-green-700'
                : 'bg-yellow-100 text-yellow-700' }}">
            {{ ucfirst($p->status) }}
        </span>
    </div>

    <p class="text-gray-600 mb-4">
        {{ $p->isi ?? 'Tidak ada isi pengaduan.' }}
    </p>

    <a href="{{ route('admin.show', $p->id) }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
        Lihat & Jawab
    </a>

</div>

@endforeach

@endsection
