@extends('layouts.siswa')

@section('title', 'Edit Pengaduan')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-700">Edit Pengaduan</h2>
</div>

<div class="bg-white shadow-md rounded-2xl p-6 max-w-2xl border border-blue-100">

<form action="{{ route('siswa.update',$pengaduan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
@csrf
@method('PUT')

<input type="text" name="judul"
    value="{{ old('judul',$pengaduan->judul) }}"
    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">

<textarea name="isi" rows="4"
    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary">{{ old('isi',$pengaduan->isi) }}</textarea>

@if($pengaduan->foto)
<img src="{{ asset('storage/'.$pengaduan->foto) }}"
     class="rounded-xl mb-4">
@endif

<input type="file" name="foto"
    class="w-full border rounded-lg px-4 py-2 bg-gray-50">

<div class="flex gap-3">

<button class="bg-primary hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
Update
</button>

<a href="{{ route('siswa.dashboard') }}"
   class="bg-gray-300 px-6 py-2 rounded-lg">
   Batal
</a>

</div>

</form>
</div>

@endsection
