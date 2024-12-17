<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PembayaranController extends Controller
{
    public function show(Request $request, $nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();

        if (!$siswa) {
            return view('page.pembayaran', [
                'siswa' => null,
                'message' => 'Data siswa tidak ditemukan.'
            ]);
        }

        return view('page.pembayaran', [
            'siswa' => $siswa
        ]);
    }

    public function processPayment(Request $request)
    {
        try {
            // Validasi input (opsional)
            $request->validate([
                'id_pendaftaran' => 'required|exists:pendaftarans,id',
                'jumlah_pembayaran' => 'required|numeric',
                'metode_pembayaran' => 'required|string',
            ]);

            // Simpan data pembayaran
            $pembayaran = Pembayaran::create([
                'id_pendaftaran' => $request->input('id_pendaftaran'),
                'jumlah_pembayaran' => $request->input('jumlah_pembayaran'),
                'tanggal_pembayaran' => now(),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'status' => 'completed', // Status pembayaran berhasil
            ]);

            // Perbarui status pendaftaran
            $pendaftaran = Pendaftaran::find($pembayaran->id_pendaftaran);
            $pendaftaran->status = 'completed'; // Ubah status menjadi 'completed'
            $pendaftaran->save();

            // Berikan respons JSON untuk AJAX
            return response()->json(['success' => true, 'message' => 'Pembayaran berhasil diproses!']);
        } catch (\Exception $e) {
            // Tangani error
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
