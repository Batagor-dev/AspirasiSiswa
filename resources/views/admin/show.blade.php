@extends('layouts.admin')

@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-700">
        Detail Pengaduan
    </h2>
</div>

<div class="bg-white shadow-md border border-blue-100 rounded-2xl p-6">

    <h3 class="text-xl font-semibold text-gray-800 mb-2">
        {{ $pengaduan->judul }}
    </h3>

    <span class="text-xs px-3 py-1 rounded-full
        {{ $pengaduan->status == 'selesai'
            ? 'bg-green-100 text-green-700'
            : 'bg-yellow-100 text-yellow-700' }}">
        {{ ucfirst($pengaduan->status) }}
    </span>

    <p class="text-gray-600 mt-4 mb-5">
        {{ $pengaduan->isi }}
    </p>

    @if($pengaduan->foto)
        <img src="{{ asset('storage/'.$pengaduan->foto) }}"
             class="w-full max-w-md rounded-xl mb-6 shadow">
    @endif

    <hr class="my-6">

    <form action="{{ route('admin.jawab', $pengaduan->id) }}"
          method="POST"
          class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-blue-700 mb-2">
                Jawaban Admin
            </label>

            <textarea name="jawaban"
                      rows="4"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                      required>{{ $pengaduan->jawaban }}</textarea>
        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition">
            Simpan Jawaban
        </button>
    </form>

    @if($pengaduan->jawaban)
        <form action="{{ route('admin.hapusJawaban', $pengaduan->id) }}"
              method="POST"
              class="mt-4">
            @csrf
            @method('DELETE')

            <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition">
                Hapus Jawaban
            </button>
        </form>
    @endif

</div>

@endsection
