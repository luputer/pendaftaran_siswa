<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Selamat Datang di Sekolah ku</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#06B6D4',
                        accent: '#F59E0B',
                        neutral: '#F3F4F6',
                        'base-100': '#FFFFFF',
                        'base-200': '#F9FAFB',
                        'base-300': '#F3F4F6',
                    }
                }
            }
        }
    </script>
</head>

<body x-bind:class="darkMode ? 'dark bg-gray-900 text-white' : 'bg-white text-gray-800'"
    class="font-sans transition-colors duration-300">
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="w-full navbar bg-white shadow-sm dark:bg-gray-800">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="flex-1 px-2 mx-2 text-primary font-bold text-xl">Sekolah ku</div>
                <div class="flex-none hidden lg:block">
                    <ul class="menu menu-horizontal">
                        <li><a href="#beranda" class="hover:text-primary">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-primary">Tentang Kami</a></li>
                        <li><a href="#program" class="hover:text-primary">Program Unggulan</a></li>
                        <li><a href="#fasilitas" class="hover:text-primary">Fasilitas</a></li>
                        <li><a href="#kontak" class="hover:text-primary">Kontak</a></li>
                    </ul>
                </div>
                <button class="btn btn-ghost btn-circle" @click="darkMode = !darkMode">
                    <svg x-show="!darkMode" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                        </path>
                    </svg>
                    <svg x-show="darkMode" class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Main Content -->
            <main class="container mx-auto px-4 py-8">
                <!-- Hero Section -->
                <section id="beranda"
                    class="hero min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900">
                    <div class="hero-content text-center">
                        <div class="max-w-md">
                            <h1 class="text-5xl font-bold text-gray-800 dark:text-white mb-4">Selamat Datang di Sekolah
                                Kita</h1>
                            <p class="py-6 text-gray-600 dark:text-gray-300">Tempat di mana bakat dan potensi berkembang
                            </p>
                            <a href="/daftar" class="btn btn-primary">Daftar Sekarang</a>
                        </div>
                    </div>
                </section>

                <!-- About Section -->
                <section id="tentang" class="py-16 bg-white dark:bg-gray-800 rounded-lg shadow-sm my-8">
                    <div class="max-w-4xl mx-auto px-6">
                        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Tentang Kami</h2>
                        <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                            <p class="mb-6">Sekolah Kita adalah lembaga pendidikan yang berdedikasi untuk mengembangkan
                                potensi setiap siswa. Dengan kurikulum yang komprehensif dan fasilitas modern, kami
                                berkomitmen untuk menciptakan lingkungan belajar yang inspiratif dan inovatif.</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>Didirikan sejak tahun 1990</li>
                                <li>Akreditasi A</li>
                                <li>Lebih dari 500 alumni sukses</li>
                                <li>Staf pengajar berkualifikasi tinggi</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Programs Section -->
                <section id="program" class="py-16" x-data="{ activeSlide: 1 }">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Program Unggulan</h2>
                    <div class="carousel w-full max-w-4xl mx-auto">
                        <template x-for="(slide, index) in [
                            {title: 'Program Bilingual', desc: 'Meningkatkan kemampuan bahasa Inggris siswa melalui pembelajaran bilingual.'},
                            {title: 'Kelas Sains dan Teknologi', desc: 'Mempersiapkan siswa untuk era digital dengan fokus pada sains dan teknologi terkini.'},
                            {title: 'Program Kepemimpinan', desc: 'Mengembangkan soft skills dan jiwa kepemimpinan siswa melalui berbagai kegiatan.'},
                            {title: 'Ekstrakurikuler Beragam', desc: 'Menyediakan berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.'}
                        ]" :key="index">
                            <div class="carousel-item w-full" x-show="activeSlide === index + 1">
                                <div class="card bg-blue-50 dark:bg-gray-700 shadow-lg mx-4">
                                    <div class="card-body">
                                        <h3 class="card-title text-primary dark:text-white" x-text="slide.title"></h3>
                                        <p class="text-gray-600 dark:text-gray-300" x-text="slide.desc"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="flex justify-center w-full py-4 gap-2">
                        <template x-for="i in 4" :key="i">
                            <button class="btn btn-xs" :class="activeSlide === i ? 'btn-primary' : 'btn-ghost'"
                                @click="activeSlide = i" x-text="i"></button>
                        </template>
                    </div>
                </section>

                <!-- Facilities Section -->
                  <section id="fasilitas"
                    class="py-16 mt-10 bg-white dark:bg-gray-900 rounded-lg shadow-sm w-full mx-auto p-5">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">QNA</h2>
                    <div class="join join-vertical mx-auto w-full">
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" checked />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                kapan pertama kali ngoding dan kenapa suka ngoding ?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Jika dibilang suka mungkin tidak terlalu, tapi saya mulai tertarik sejak semester 1
                                    saat pertama kali mendapatkan kursus gratis dari <a
                                        href="https://www.dicoding.com/">Dicoding</a> dan Codepolitan. Itulah pertama
                                    kali saya mulai ngoding. Mulai dari HTML, CSS, dan JavaScript, hingga sekarang masih
                                    terus belajar ngoding, sampai ke REACT, NEXTJS, MERN, dan LARAVEL. Yang seru saat
                                    menemukan error yang lama dan ketemu bugnya. <br>
                                    <span class=" badge badge-md p-1 font-semibold text-dark  badge-primary">~BY
                                        Saidi</span> </p>
                                <p> Saya pertama kali ngoding karna kebetulan awalnya saya tidak diterima masuk di
                                    jurusan tkj smk, jadi terpaksa saya harus masuk ke pilihan ke3 yaitu RPL yang
                                    dimana, diharuskan ngoding terus. awalnya memang berat tapi sekarang tetap masih
                                    berat XIXIXIX <br>
                                    <span class=" badge badge-md p-1 font-semibold text-dark  badge-primary">~By
                                        Ari</span> </p>
                            </div>
                        </div>
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                Apakah ada framework atau teknologi baru yang ingin Anda pelajari dalam waktu dekat?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Framework yang baru ingin saya pelajari mungkin React dan framework-nya, Next.js,
                                    karena seru bisa membuat berbagai macam UI. Saya juga baru tahu kalau frontend itu
                                    banyak bermain dengan data dan logika. Selain itu, mungkin saya juga ingin belajar
                                    backend dengan Laravel, karena untuk membuat aplikasi yang cepat, Laravel adalah
                                    pilihan yang menarik dibandingkan framework lain. Selain itu, saya juga tertarik
                                    untuk mempelajari Python karena saya tertarik dengan AI dan Data Science.
                                    <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~BY
                                        Saidi</span>
                                </p>
                                <p> Mungkin saya ingin belajar React js , karena saya melihat React sangat keren dan
                                    multifungsi
                                    <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~By
                                        Ari</span>
                                </p>
                            </div>
                        </div>
                        <div
                            class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                            <input type="radio" name="facilities" />
                            <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                                Apa bahasa pemerograman yang paling di sukai dan kenapa ?
                            </div>
                            <div class="collapse-content text-gray-600 dark:text-gray-300">
                                <p> Bahasa pemrograman yang paling disukai saya kurang tahu pasti, tetapi karena sering
                                    menggunakan JavaScript, mungkin saya memilih JavaScript karena dapat digunakan di
                                    berbagai platform. <br>
                                    <span
                                        class=" badge badge-md p-1 font-semibold dark:text-dark text-light    badge-primary">~By
                                        Saidi</span></p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Contact Section -->
                <section id="kontak" class="py-16">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Hubungi Kami</h2>
                    <div class="card bg-white dark:bg-gray-700 shadow-xl max-w-2xl mx-auto">
                        <div class="card-body">
                            <div class="space-y-4 text-gray-600 dark:text-gray-300">
                                <p><strong class="text-gray-800 dark:text-white">Alamat:</strong> Jl. Pendidikan No.
                                    123, Kota Sejahtera</p>
                                <p><strong class="text-gray-800 dark:text-white">Telepon:</strong> (021) 1234-5678</p>
                                <p><strong class="text-gray-800 dark:text-white">Email:</strong> info@sekolahkita.edu
                                </p>
                                <p><strong class="text-gray-800 dark:text-white">Jam Operasional:</strong> Senin -
                                    Jumat, 07.00 - 16.00 WIB</p>
                            </div>
                            <div class="card-actions justify-end mt-6">
                                <button class="btn btn-primary">Kirim Pesan</button>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <!-- Footer -->
            <footer class="footer p-10 bg-gray-50 text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                <div>
                    <span class="footer-title text-primary">Sekolah Kita</span>
                    <p>&copy; 2023 Sekolah Kita. Hak Cipta Dilindungi.</p>
                    <p>Dibuat dengan ❤️ untuk pendidikan berkualitas</p>
                </div>
                <div>
                    <span class="footer-title text-primary">Social Media</span>
                    <div class="grid grid-flow-col gap-4">
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                                </path>
                            </svg>
                        </a>
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                                </path>
                            </svg>
                        </a>
                        <a class="hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                class="fill-current">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 w-80 h-full bg-white dark:bg-gray-800">
                <li><a href="#beranda" class="text-gray-700 hover:text-primary dark:text-white">Beranda</a></li>
                <li><a href="#tentang" class="text-gray-700 hover:text-primary dark:text-white">Tentang Kami</a></li>
                <li><a href="#program" class="text-gray-700 hover:text-primary dark:text-white">Program Unggulan</a>
                </li>
                <li><a href="#fasilitas" class="text-gray-700 hover:text-primary dark:text-white">Fasilitas</a></li>
                <li><a href="#kontak" class="text-gray-700 hover:text-primary dark:text-white">Kontak</a></li>
            </ul>
        </div>
    </div>