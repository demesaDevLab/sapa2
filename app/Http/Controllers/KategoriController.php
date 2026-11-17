<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')
            ->orderBy('id', 'asc')
            ->get();

        return view('data_master.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah digunakan.',
        ]);

        DB::table('kategori')->insert([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori,' . $id,
            'deskripsi' => 'nullable|string',
        ]);

        DB::table('kategori')
            ->where('id', $id)
            ->update([
                'nama_kategori' => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dipakai = DB::table('pengaduan')
            ->where('kategori_id', $id)
            ->exists();

        if ($dipakai) {
            return back()->with(
                'error',
                'Kategori tidak dapat dihapus karena sudah digunakan pada pengaduan.'
            );
        }

        DB::table('kategori')
            ->where('id', $id)
            ->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
