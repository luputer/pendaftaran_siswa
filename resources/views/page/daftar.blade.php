<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>Pendaftaran Murid Baru - Sekolah Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-200">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Selamat Datang di Sekolah Kita</h1>

        <div class="grid md:grid-cols-2 gap-8">
            <section class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4">Tentang Sekolah Kita</h2>
                    <p class="mb-4">Sekolah Kita adalah lembaga pendidikan unggulan yang berdedikasi untuk mengembangkan potensi setiap siswa.</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Akreditasi A</li>
                        <li>Guru-guru berpengalaman</li>
                        <li>Fasilitas modern</li>
                    </ul>
                </div>
            </section>

            <section class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4">Formulir Pendaftaran Murid Baru</h2>
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <!-- NISN -->
                        <div class="form-control">
                            <label class="label" for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="form-control">
                            <label class="label" for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-control">
                            <label class="label" for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-control">
                            <label class="label">Jenis Kelamin</label>
                            <div class="flex space-x-4">
                                <label class="label cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="radio radio-primary" required />
                                    <span class="label-text ml-2">Laki-laki</span>
                                </label>
                                <label class="label cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="radio radio-primary" required />
                                    <span class="label-text ml-2">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-control">
                            <label class="label" for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="textarea textarea-bordered textarea-primary" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <!-- Nama Orang Tua/Wali -->
                        <div class="form-control">
                            <label class="label" for="nama_orang_tua">Nama Orang Tua/Wali</label>
                            <input type="text" id="nama_orang_tua" name="nama_orang_tua" placeholder="Masukkan nama orang tua/wali" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="form-control">
                            <label class="label" for="no_telp">Nomor Telepon</label>
                            <input type="tel" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Sekolah Asal -->
                        <div class="form-control">
                            <label class="label" for="sekolah_asal">Sekolah Asal</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" placeholder="Masukkan sekolah asal" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Nilai Ujian -->
                        <div class="form-control">
                            <label class="label" for="nilai_ujian">Nilai Ujian</label>
                            <input type="number" id="nilai_ujian" name="nilai_ujian" placeholder="Masukkan nilai ujian" class="input input-bordered input-primary w-full" required />
                        </div>

                        <!-- Ijazah -->
                        <div class="form-control">
                            <label class="label" for="ijazah">Ijazah</label>
                            <input type="file" id="ijazah" name="ijazah" class="file-input file-input-bordered file-input-primary w-full" required />
                        </div>

                        <!-- Submit Button -->
                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary w-full">Daftar</button>
                        </div>

                        <!-- Error Message -->
                        @if ($errors->any())
                            <div class="alert alert-error mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
