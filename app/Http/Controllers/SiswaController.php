<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
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
                return response()->json([
                    'message' => 'Validasi gagal.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();

            if ($request->hasFile('ijazah')) {
                $fileName = $request->nisn . '_ijazah.' . $request->file('ijazah')->extension();
                $path = $request->file('ijazah')->storeAs('uploads/ijazah', $fileName, 'public');
                $validatedData['ijazah'] = $fileName;
            }

            $siswa = Siswa::create($validatedData);

            return response()->json([
                'message' => 'Pendaftaran berhasil.',
                'data' => $siswa
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error during Siswa registration: ' . $e->getMessage());
            return response()->json([
                'message' => 'Terjadi kesalahan saat memproses pendaftaran.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
