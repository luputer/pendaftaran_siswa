<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran - Sekolah Kita</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-base-300">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-primary">Pembayaran Pendaftaran</h1>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Ringkasan Pembayaran -->
            <section class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4 text-primary">Ringkasan Pembayaran</h2>
                    <div class="space-y-2 text-base-content">
                        <p><span class="font-semibold">Nama Siswa:</span> <span x-text="nama"></span></p>
                        <p><span class="font-semibold">NISN:</span> <span x-text="nisn"></span></p>
                        <p><span class="font-semibold">Biaya Pendaftaran:</span> Rp 500.000</p>
                        <p><span class="font-semibold">Biaya Seragam:</span> Rp 300.000</p>
                        <p><span class="font-semibold">Biaya Buku:</span> Rp 200.000</p>
                        <div class="divider"></div>
                        <p class="text-lg font-bold">Total: Rp 1.000.000</p>
                    </div>
                </div>
            </section>

            <!-- Form Pembayaran -->
            <section class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4 text-primary">Detail Pembayaran</h2>
                    <form x-data="{ 
                        metodePembayaran: '',
                        nomorKartu: '',
                        namaPemilik: '',
                        tanggalKadaluarsa: '',
                        cvv: '',
                        submitForm() {
                            // Logika pengiriman form bisa ditambahkan di sini
                            alert('Pembayaran berhasil diproses!');
                        }
                    }" @submit.prevent="submitForm" class="space-y-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-base-content">Metode Pembayaran</span>
                            </label>
                            <select x-model="metodePembayaran" class="select select-primary w-full bg-base-100 text-base-content" required>
                                <option disabled selected value="">Pilih metode pembayaran</option>
                                <option>Kartu Kredit</option>
                                <option>Transfer Bank</option>
                                <option>E-Wallet</option>
                            </select>
                        </div>

                        <div x-show="metodePembayaran === 'Kartu Kredit'">
                            <div class="form-control">
                                <label class="label" for="nomorKartu">
                                    <span class="label-text text-base-content">Nomor Kartu</span>
                                </label>
                                <input type="text" id="nomorKartu" x-model="nomorKartu" placeholder="1234 5678 9012 3456" class="input input-bordered input-primary w-full bg-base-100 text-base-content" required />
                            </div>

                            <div class="form-control">
                                <label class="label" for="namaPemilik">
                                    <span class="label-text text-base-content">Nama Pemilik Kartu</span>
                                </label>
                                <input type="text" id="namaPemilik" x-model="namaPemilik" placeholder="Nama sesuai kartu" class="input input-bordered input-primary w-full bg-base-100 text-base-content" required />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label" for="tanggalKadaluarsa">
                                        <span class="label-text text-base-content">Tanggal Kadaluarsa</span>
                                    </label>
                                    <input type="text" id="tanggalKadaluarsa" x-model="tanggalKadaluarsa" placeholder="MM/YY" class="input input-bordered input-primary w-full bg-base-100 text-base-content" required />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="cvv">
                                        <span class="label-text text-base-content">CVV</span>
                                    </label>
                                    <input type="text" id="cvv" x-model="cvv" placeholder="123" class="input input-bordered input-primary w-full bg-base-100 text-base-content" required />
                                </div>
                            </div>
                        </div>

                        <div x-show="metodePembayaran === 'Transfer Bank'">
                            <div class="alert alert-info shadow-lg">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Silakan transfer ke rekening berikut:</span>
                                </div>
                            </div>
                            <p class="text-base-content mt-2">Bank XYZ</p>
                            <p class="text-base-content">No. Rekening: 1234567890</p>
                            <p class="text-base-content">Atas Nama: Sekolah Kita</p>
                        </div>

                        <div x-show="metodePembayaran === 'E-Wallet'">
                            <div class="alert alert-info shadow-lg">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Silakan scan QR code berikut:</span>
                                </div>
                            </div>
                            <div class="flex justify-center mt-4">
                                <img src="https://picsum.photos/200" alt="QR Code" class="w-48 h-48" />
                            </div>
                        </div>
                        
                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</body>
</html>

