@extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-700">Dashboard Siswa</h2>
    <p class="text-gray-500">Kelola laporan pengaduan kamu</p>
</div>

@if(session('success'))
<div class="bg-blue-100 text-blue-700 px-4 py-3 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif


<!-- FORM -->
<div class="bg-white shadow-md rounded-2xl p-6 mb-8 border border-blue-100">
    <h3 class="text-lg font-semibold mb-4 text-blue-700">
        Buat Pengaduan
    </h3>

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <input type="text" name="judul" required
            placeholder="Masukkan judul pengaduan..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none">

        <textarea name="isi" rows="4"
            placeholder="Tulis isi laporan..."
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:outline-none"></textarea>

        <input type="file" name="foto"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50">

        <button class="bg-primary hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Kirim Pengaduan
        </button>

    </form>
</div>


<!-- LIST -->
<h3 class="text-lg font-semibold mb-4 text-blue-700">
    Daftar Pengaduan Saya
</h3>

<div class="grid md:grid-cols-2 gap-6">
@foreach($pengaduans as $p)

<div class="bg-white shadow-md rounded-2xl p-5 border border-blue-100 hover:shadow-xl transition">

    <div class="flex justify-between mb-2">
        <h4 class="font-bold text-gray-800">{{ $p->judul }}</h4>

        <span class="text-xs px-3 py-1 rounded-full
            @if($p->status == 'proses') bg-yellow-100 text-yellow-700
            @elseif($p->status == 'selesai') bg-green-100 text-green-700
            @else bg-gray-200 text-gray-600
            @endif">

            {{ ucfirst($p->status) }}
        </span>
    </div>

    <p class="text-sm text-gray-600 mb-3">
        {{ $p->isi ?? 'Tidak ada isi pengaduan.' }}
    </p>

    @if($p->foto)
        <img src="{{ asset('storage/'.$p->foto) }}"
             class="w-full h-40 object-cover rounded-lg mb-3">
    @endif

    <div class="flex gap-3">

        <a href="{{ route('siswa.edit',$p->id) }}"
           class="bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
           Edit
        </a>

        <a href="{{ route('siswa.show',$p->id) }}"
           class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm">
           Lihat
        </a>

        <form action="{{ route('siswa.destroy',$p->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">
                Hapus
            </button>
        </form>

    </div>

</div>

@endforeach
</div>

@endsection
