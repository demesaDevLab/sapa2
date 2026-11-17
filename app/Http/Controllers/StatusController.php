<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        $status = DB::table('status')
            ->orderBy('id', 'asc')
            ->get();

        return view('data_master.status.index', compact('status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_status' => 'required|string|max:50|unique:status,nama_status',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_status.required' => 'Nama status wajib diisi.',
            'nama_status.unique' => 'Nama status sudah digunakan.',
        ]);

        DB::table('status')->insert([
            'nama_status' => $request->nama_status,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Status berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_status' => 'required|string|max:50|unique:status,nama_status,' . $id,
            'deskripsi' => 'nullable|string',
        ], [
            'nama_status.required' => 'Nama status wajib diisi.',
            'nama_status.unique' => 'Nama status sudah digunakan.',
        ]);

        DB::table('status')
            ->where('id', $id)
            ->update([
                'nama_status' => $request->nama_status,
                'deskripsi' => $request->deskripsi,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dipakai = DB::table('pengaduan')
            ->where('status_id', $id)
            ->exists();

        if ($dipakai) {
            return back()->with(
                'error',
                'Status tidak dapat dihapus karena sudah digunakan pada pengaduan.'
            );
        }

        DB::table('status')
            ->where('id', $id)
            ->delete();

        return back()->with('success', 'Status berhasil dihapus.');
    }
}
