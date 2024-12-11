<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PembayaranController extends Controller
{
    public function show(Request $request)
    {
        $nisn = $request->query('nisn');
        $siswa = Siswa::where('nisn', $nisn)->first();

        return view('page.pembayaran', [
            'siswa' => $siswa,
            'total' => 1000000 // Total biaya, misalnya Rp 1.000.000
        ]);
    }

    public function processPayment(Request $request)
    {
        try {
            // Logika validasi dan pemrosesan pembayaran (misalnya: validasi data pembayaran)

            // Contoh logika penyimpanan pembayaran
            $pembayaran = Pembayaran::create([
                'id_pendaftaran' => $request->input('id_pendaftaran'),
                'jumlah_pembayaran' => $request->input('jumlah_pembayaran'),
                'tanggal_pembayaran' => now(),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'status' => 'berhasil',
            ]);

            // Update status pendaftaran menjadi "berhasil"
            $pendaftaran = Pendaftaran::find($pembayaran->id_pendaftaran);
            $pendaftaran->status = 'berhasil';
            $pendaftaran->save();

            return response()->json(['message' => 'Pembayaran berhasil diproses', 'pembayaran' => $pembayaran]);
        } catch (\Exception $e) {
            Log::error('Error processing payment: ' . $e->getMessage());

            return response()->json(['message' => 'Terjadi kesalahan saat memproses pembayaran', 'error' => $e->getMessage()], 500);
        }
    }
}
