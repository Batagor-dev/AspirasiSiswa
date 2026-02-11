<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('siswa.dashboard', compact('pengaduans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'nullable|string',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'foto'    => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Pengaduan berhasil dibuat');
    }

    public function edit(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        return view('siswa.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'nullable|string',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
            $pengaduan->foto = $fotoPath;
        }

        $pengaduan->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
        ]);

    return redirect()->route('siswa.dashboard')->with('success', 'Pengaduan diperbarui')    ;
    }

    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan dihapus');
    }

    public function show(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id !== Auth::id()) {
            abort(403);
        }

        return view('siswa.show', compact('pengaduan'));
    }

}
