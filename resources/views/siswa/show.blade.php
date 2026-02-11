@extends('layouts.siswa')

@section('title', 'Detail Pengaduan')

@section('content')

<div class="bg-white shadow-md rounded-2xl p-6 border border-blue-100">

<h3 class="text-xl font-bold text-blue-700 mb-3">
    {{ $pengaduan->judul }}
</h3>

<p class="text-gray-600 mb-4">
    {{ $pengaduan->isi }}
</p>

@if($pengaduan->foto)
<img src="{{ asset('storage/'.$pengaduan->foto) }}"
     class="rounded-xl mb-5 max-w-md">
@endif

<hr class="my-5">

<h4 class="font-semibold text-blue-700 mb-2">
    Jawaban Admin
</h4>

@if($pengaduan->jawaban)

<div class="bg-blue-50 border border-blue-200 p-4 rounded-xl text-blue-800">
    {{ $pengaduan->jawaban }}
</div>

@else

<div class="bg-yellow-50 border border-yellow-200 p-4 rounded-xl text-yellow-700">
    Belum ada jawaban admin
</div>

@endif

<a href="{{ route('siswa.dashboard') }}"
   class="inline-block mt-6 bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700">
   Kembali
</a>

</div>

@endsection
