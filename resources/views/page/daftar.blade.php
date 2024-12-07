<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pendaftaran Murid Baru - Sekolah Kita</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
                    <form 
                        x-data="registrationForm()" 
                        @submit.prevent="submitForm" 
                        class="space-y-4"
                    >
                        @csrf
                        <div class="form-control">
                            <label class="label" for="nisn">NISN</label>
                            <input 
                                type="text" 
                                id="nisn" 
                                x-model="formData.nisn" 
                                placeholder="Masukkan NISN" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="nama">Nama Lengkap</label>
                            <input 
                                type="text" 
                                id="nama" 
                                x-model="formData.nama" 
                                placeholder="Masukkan nama lengkap" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="tanggalLahir">Tanggal Lahir</label>
                            <input 
                                type="date" 
                                id="tanggalLahir" 
                                x-model="formData.tgl_lahir" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label">Jenis Kelamin</label>
                            <div class="flex space-x-4">
                                <label class="label cursor-pointer">
                                    <input 
                                        type="radio" 
                                        name="jenis_kelamin" 
                                        value="Laki-laki" 
                                        x-model="formData.jenis_kelamin" 
                                        class="radio radio-primary" 
                                        required 
                                    />
                                    <span class="label-text ml-2">Laki-laki</span>
                                </label>
                                <label class="label cursor-pointer">
                                    <input 
                                        type="radio" 
                                        name="jenis_kelamin" 
                                        value="Perempuan" 
                                        x-model="formData.jenis_kelamin" 
                                        class="radio radio-primary" 
                                        required 
                                    />
                                    <span class="label-text ml-2">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="label" for="alamat">Alamat</label>
                            <textarea 
                                id="alamat" 
                                x-model="formData.alamat" 
                                class="textarea textarea-bordered textarea-primary" 
                                placeholder="Masukkan alamat lengkap" 
                                required
                            ></textarea>
                        </div>

                        <div class="form-control">
                            <label class="label" for="namaOrangTua">Nama Orang Tua/Wali</label>
                            <input 
                                type="text" 
                                id="namaOrangTua" 
                                x-model="formData.nama_orang_tua" 
                                placeholder="Masukkan nama orang tua/wali" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="nomorTelepon">Nomor Telepon</label>
                            <input 
                                type="tel" 
                                id="nomorTelepon" 
                                x-model="formData.no_telp" 
                                placeholder="Masukkan nomor telepon" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="sekolahAsal">Sekolah Asal</label>
                            <input 
                                type="text" 
                                id="sekolahAsal" 
                                x-model="formData.sekolah_asal" 
                                placeholder="Masukkan nama sekolah asal" 
                                class="input input-bordered input-primary w-full" 
                                required 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="nilaiUjian">Nilai Ujian</label>
                            <input 
                                type="number" 
                                id="nilaiUjian" 
                                x-model="formData.nilai_ujian" 
                                placeholder="Masukkan nilai ujian" 
                                class="input input-bordered input-primary w-full" 
                                required min="0" max="100" 
                            />
                        </div>

                        <div class="form-control">
                            <label class="label" for="ijazah">Ijazah</label>
                            <input 
                                type="file" 
                                id="ijazah" 
                                @change="handleFileUpload" 
                                class="file-input file-input-bordered file-input-primary w-full" 
                                accept=".pdf,.jpg,.jpeg,.png" 
                                required 
                            />
                        </div>

                        <div x-show="errorMessage" class="alert alert-error">
                            <span x-text="errorMessage"></span>
                        </div>

                        <div class="form-control mt-6">
                            <button 
                                type="submit" 
                                class="btn btn-primary" 
                                :disabled="isLoading"
                            >
                                <span x-show="!isLoading">Daftar</span>
                                <span x-show="isLoading">Mengirim...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script>
        function registrationForm() {
            return {
                formData: {
                    nisn: '',
                    nama: '',
                    tgl_lahir: '',
                    jenis_kelamin: '',
                    alamat: '',
                    nama_orang_tua: '',
                    no_telp: '',
                    sekolah_asal: '',
                    nilai_ujian: '',
                },
                ijazahFile: null,
                isLoading: false,
                errorMessage: '',

                handleFileUpload(event) {
                    this.ijazahFile = event.target.files[0];
                },

                submitForm() {
                    this.errorMessage = '';
                    this.isLoading = true;

                    const formData = new FormData();
                    Object.keys(this.formData).forEach(key => {
                        formData.append(key, this.formData[key]);
                    });

                    if (this.ijazahFile) {
                        formData.append('ijazah', this.ijazahFile);
                    }

                    fetch('/daftar-siswa', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => {
                        this.isLoading = false;
                        if (!response.ok) {
                            return response.json().then(errorData => {
                                throw new Error(errorData.message || 'Gagal mengirim data');
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert(data.message);
                        this.resetForm();
                    })
                    .catch(error => {
                        this.isLoading = false;
                        console.error('Error:', error);
                        this.errorMessage = error.message || 'Terjadi kesalahan saat mengirim formulir.';
                    });
                },

                resetForm() {
                    Object.keys(this.formData).forEach(key => {
                        this.formData[key] = '';
                    });
                    document.getElementById('ijazah').value = '';
                    this.ijazahFile = null;
                    this.errorMessage = '';
                }
            };
        }
    </script>
</body>
</html>