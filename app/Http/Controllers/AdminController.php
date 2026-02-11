<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // List semua pengaduan
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('admin.dashboard', compact('pengaduans'));
    }

    // Detail pengaduan
    public function show(Pengaduan $pengaduan)
    {
        return view('admin.show', compact('pengaduan'));
    }

    // Simpan / update jawaban
    public function jawab(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'jawaban' => 'required|string'
        ]);

        $pengaduan->update([
            'jawaban' => $request->jawaban,
            'status'  => 'selesai'
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Jawaban berhasil disimpan');
    }

    // Hapus jawaban saja
    public function hapusJawaban(Pengaduan $pengaduan)
    {
        $pengaduan->update([
            'jawaban' => null,
            'status'  => 'proses'
        ]);

        return redirect()->back()
            ->with('success', 'Jawaban berhasil dihapus');
    }
}
