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
                        <p><span class="font-semibold">Nama Siswa:</span> {{ $siswa->nama }}</p>
                        <p><span class="font-semibold">NISN:</span> {{ $siswa->nisn }}</p>
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
                    <form action="{{ route('pembayaran.process') }}" method="POST" class="space-y-4" x-data="{ 
                        metodePembayaran: '',
                        nomorKartu: '',
                        namaPemilik: '',
                        tanggalKadaluarsa: '',
                        cvv: '',
                        submitForm() {
                            // Logika pengiriman form bisa ditambahkan di sini
                            alert('Pembayaran berhasil diproses!');
                            window.location.href = '/'; // Ganti '/' dengan URL halaman utama Anda
                        }
                    }" @submit.prevent="submitForm">
                        @csrf
                        <input type="hidden" name="id_pendaftaran" value="{{ $siswa->pendaftaran->id ?? '' }}">
                        <input type="hidden" name="jumlah_pembayaran" value="1000000">

                        <!-- Metode Pembayaran -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text text-base-content">Metode Pembayaran</span>
                            </label>
                            <select x-model="metodePembayaran" name="metode_pembayaran" class="select select-primary w-full bg-base-100 text-base-content" required>
                                <option disabled selected value="">Pilih metode pembayaran</option>
                                <option value="Kartu Kredit">Kartu Kredit</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </div>

                        <!-- Informasi Kartu Kredit -->
                        <div x-show="metodePembayaran === 'Kartu Kredit'" id="kartu-kredit">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-base-content">Nomor Kartu</span>
                                </label>
                                <input type="text" name="nomor_kartu" placeholder="1234 5678 9012 3456" class="input input-bordered input-primary w-full bg-base-100 text-base-content" />
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text text-base-content">Nama Pemilik Kartu</span>
                                </label>
                                <input type="text" name="nama_pemilik" placeholder="Nama sesuai kartu" class="input input-bordered input-primary w-full bg-base-100 text-base-content" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-base-content">Tanggal Kadaluarsa</span>
                                    </label>
                                    <input type="text" name="tanggal_kadaluarsa" placeholder="MM/YY" class="input input-bordered input-primary w-full bg-base-100 text-base-content" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text text-base-content">CVV</span>
                                    </label>
                                    <input type="text" name="cvv" placeholder="123" class="input input-bordered input-primary w-full bg-base-100 text-base-content" />
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Bank -->
                        <div x-show="metodePembayaran === 'Transfer Bank'" id="transfer-bank">
                            <div class="alert alert-info shadow-lg">
                                <div>
                                    <span>Silakan transfer ke rekening berikut:</span>
                                </div>
                            </div>
                            <p class="text-base-content mt-2">Bank XYZ</p>
                            <p class="text-base-content">No. Rekening: 1234567890</p>
                            <p class="text-base-content">Atas Nama: Sekolah Kita</p>
                        </div>

                        <!-- E-Wallet -->
                        <div x-show="metodePembayaran === 'E-Wallet'" id="e-wallet">
                            <div class="alert alert-info shadow-lg">
                                <div>
                                    <span>Silakan scan QR code berikut:</span>
                                </div>
                            </div>
                            <div class="flex justify-center mt-4">
                                <img src="https://picsum.photos/200" alt="QR Code" class="w-48 h-48" />
                            </div>
                        </div>

                        <!-- Tombol Proses -->
                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('paymentForm', () => ({
                metodePembayaran: '',
                nomorKartu: '',
                namaPemilik: '',
                tanggalKadaluarsa: '',
                cvv: '',
                submitForm() {
                    // Logika pengiriman form bisa ditambahkan di sini
                    alert('Pembayaran berhasil diproses!');
                    window.location.href = '/'; // Ganti '/' dengan URL halaman utama Anda
                }
            }));
        });

        const metodePembayaranSelect = document.querySelector('select[name="metode_pembayaran"]');
        const kartuKreditDiv = document.getElementById('kartu-kredit');
        const transferBankDiv = document.getElementById('transfer-bank');
        const eWalletDiv = document.getElementById('e-wallet');

        metodePembayaranSelect.addEventListener('change', (event) => {
            const selectedMetode = event.target.value;

            // Hide all sections
            kartuKreditDiv.classList.add('hidden');
            transferBankDiv.classList.add('hidden');
            eWalletDiv.classList.add('hidden');

            // Show the relevant section based on selected metode pembayaran
            if (selectedMetode === 'Kartu Kredit') {
                kartuKreditDiv.classList.remove('hidden');
            } else if (selectedMetode === 'Transfer Bank') {
                transferBankDiv.classList.remove('hidden');
            } else if (selectedMetode === 'E-Wallet') {
                eWalletDiv.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>
