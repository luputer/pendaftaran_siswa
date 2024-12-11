<?php

namespace App\Http\Controllers;

use App\Models\Siswa;  // Memastikan model Siswa dimuat  
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        // Log data yang diterima  
        Log::info('Data yang diterima:', $request->all());

        try {
            $validator = Validator::make($request->all(), [
                'nisn' => 'required|string|max:30|unique:siswas,nisn',
                'nama' => 'required|string|max:30',
                'tgl_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat' => 'required|string|max:50',
                'nama_orang_tua' => 'required|string|max:50',
                'no_telp' => 'required|numeric|digits_between:8,15',
                'sekolah_asal' => 'required|string|max:40',
                'nilai_ujian' => 'required|numeric|min:0|max:100',
                'ijazah' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            if ($validator->fails()) {
                Log::error('Validasi gagal:', $validator->errors()->all());

                return response()->json([
                    'message' => 'Validasi gagal.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();

            // Handle file upload  
            if ($request->hasFile('ijazah')) {
                $fileName = $request->nisn . '_ijazah.' . $request->file('ijazah')->extension();
                $path = $request->file('ijazah')->storeAs('uploads/ijazah', $fileName, 'public');
                $validatedData['ijazah'] = $fileName;
            }

            // Create Siswa record  
            $siswa = Siswa::create($validatedData);

            // Create Pendaftaran record  
            $pendaftaran = Pendaftaran::create([
                'nisn' => $siswa->nisn,
                'tgl_daftar' => now(),
                'status' => 'pending',
            ]);

            // Redirect to payment page  
            return redirect()->route('pembayaran.show', ['nisn' => $siswa->nisn]);
        } catch (\Exception $e) {
            Log::error('Error during Siswa registration: ' . $e->getMessage());

            return response()->json([
                'message' => 'Terjadi kesalahan saat memproses pendaftaran.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Metode untuk menampilkan detail siswa berdasarkan NISN  
    public function show($nisn)
    {
        // Ambil data siswa berdasarkan NISN  
        $siswa = Siswa::where('nisn', $nisn)->first();

        // Pastikan siswa ditemukan  
        if (!$siswa) {
            return abort(404); // Atau bisa mengarahkan ke halaman error  
        }

        // Kembalikan view dengan data siswa  
        return view('pembayaran', [
            'siswa' => $siswa
        ]);
    }
}
