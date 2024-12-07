<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Sekolah Kita</title>
      @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        accent: '#F59E0B',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-primary text-white">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold">Sekolah Kita</h1>
            <p class="mt-2">Membentuk Generasi Unggul dan Berakhlak Mulia</p>
        </div>
    </header>

    <nav class="bg-white shadow-lg" x-data="{ isOpen: false }">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex space-x-7">
                    <a href="#" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-primary text-lg">Sekolah Kita</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-4 px-2 text-primary font-semibold hover:text-secondary transition duration-300">Beranda</a>
                    <a href="#tentang" class="py-4 px-2 text-gray-500 font-semibold hover:text-secondary transition duration-300">Tentang Kami</a>
                    <a href="#program" class="py-4 px-2 text-gray-500 font-semibold hover:text-secondary transition duration-300">Program Unggulan</a>
                    <a href="#fasilitas" class="py-4 px-2 text-gray-500 font-semibold hover:text-secondary transition duration-300">Fasilitas</a>
                    <a href="#kontak" class="py-4 px-2 text-gray-500 font-semibold hover:text-secondary transition duration-300">Kontak</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button" @click="isOpen = !isOpen">
                        <svg class="w-6 h-6 text-gray-500 hover:text-secondary"
                            x-show="!isOpen"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="w-6 h-6 text-gray-500 hover:text-secondary"
                            x-show="isOpen"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false">
            <a href="#" class="block py-2 px-4 text-sm hover:bg-secondary hover:text-white transition duration-300">Beranda</a>
            <a href="#tentang" class="block py-2 px-4 text-sm hover:bg-secondary hover:text-white transition duration-300">Tentang Kami</a>
            <a href="#program" class="block py-2 px-4 text-sm hover:bg-secondary hover:text-white transition duration-300">Program Unggulan</a>
            <a href="#fasilitas" class="block py-2 px-4 text-sm hover:bg-secondary hover:text-white transition duration-300">Fasilitas</a>
            <a href="#kontak" class="block py-2 px-4 text-sm hover:bg-secondary hover:text-white transition duration-300">Kontak</a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <section id="hero" class="mb-12 text-center py-20 bg-gradient-to-r from-primary to-secondary text-white">
            <h2 class="text-4xl font-bold mb-4">Selamat Datang di Sekolah Kita</h2>
            <p class="text-xl mb-6">Tempat di mana bakat dan potensi berkembang</p>
            <a href="/daftar" class="bg-accent text-white px-6 py-3 rounded-full hover:bg-primary transition duration-300">Daftar Sekarang</a>
        </section>

        <section id="tentang" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
            <p class="mb-4">Sekolah Kita adalah lembaga pendidikan yang berdedikasi untuk mengembangkan potensi setiap siswa. Dengan kurikulum yang komprehensif dan fasilitas modern, kami berkomitmen untuk menciptakan lingkungan belajar yang inspiratif dan inovatif.</p>
            <ul class="list-disc list-inside">
                <li>Didirikan sejak tahun 1990</li>
                <li>Akreditasi A</li>
                <li>Lebih dari 500 alumni sukses</li>
                <li>Staf pengajar berkualifikasi tinggi</li>
            </ul>
        </section>

        <section id="program" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Program Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Program Bilingual</h3>
                    <p>Meningkatkan kemampuan bahasa Inggris siswa melalui pembelajaran bilingual.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Kelas Sains dan Teknologi</h3>
                    <p>Mempersiapkan siswa untuk era digital dengan fokus pada sains dan teknologi terkini.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Program Kepemimpinan</h3>
                    <p>Mengembangkan soft skills dan jiwa kepemimpinan siswa melalui berbagai kegiatan.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Ekstrakurikuler Beragam</h3>
                    <p>Menyediakan berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.</p>
                </div>
            </div>
        </section>

        <section id="fasilitas" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Fasilitas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Perpustakaan Digital</h3>
                    <p>Akses ke ribuan buku dan sumber belajar digital.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Laboratorium Sains</h3>
                    <p>Fasilitas lengkap untuk eksperimen dan penelitian ilmiah.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Lapangan Olahraga</h3>
                    <p>Area luas untuk berbagai aktivitas olahraga dan kegiatan outdoor.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Ruang Seni</h3>
                    <p>Studio khusus untuk mengembangkan kreativitas dalam bidang seni.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Kantin Sehat</h3>
                    <p>Menyediakan makanan bergizi untuk mendukung kesehatan siswa.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Ruang Multimedia</h3>
                    <p>Dilengkapi peralatan modern untuk pembelajaran interaktif.</p>
                </div>
            </div>
        </section>

        <section id="kontak" class="mb-12">
            <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="mb-2"><strong>Alamat:</strong> Jl. Pendidikan No. 123, Kota Sejahtera</p>
                <p class="mb-2"><strong>Telepon:</strong> (021) 1234-5678</p>
                <p class="mb-2"><strong>Email:</strong> info@sekolahkita.edu</p>
                <p class="mb-4"><strong>Jam Operasional:</strong> Senin - Jumat, 07.00 - 16.00 WIB</p>
                <a href="#" class="bg-primary text-white px-4 py-2 rounded hover:bg-secondary transition duration-300">Kirim Pesan</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2023 Sekolah Kita. Hak Cipta Dilindungi.</p>
            <p class="mt-2">Dibuat dengan ❤️ untuk pendidikan berkualitas</p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>

