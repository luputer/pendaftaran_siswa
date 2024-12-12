<!DOCTYPE html>
<html lang="id" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" 
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di SIPCAL</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
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
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div> 
                <div class="flex-1 px-2 mx-2 text-primary font-bold text-xl">SIPCAL</div>
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
                    <svg x-show="!darkMode" class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
            </div>

<!-- Main Content -->
<main class="container mx-auto px-4 py-8 w-full">
    <!-- Hero Section -->
    <div class="hero min-h-[70vh]">
        <div class="hero-content flex-col lg:flex-row-reverse gap-8">
            <div class="flex-1 grid grid-cols-2 gap-4 max-w-xl w-96">  
                @if($personalBrandData->isEmpty())  
                    <p>No images available.</p>  
                @else  
                    @foreach($personalBrandData as $data)  
                        <div class="relative">  
                            <img src="{{ asset('storage/' . $data->image) }}" alt="Image" class="rounded-lg shadow-2xl bg-cover w-full h-full object-cover" />  
                        </div>  
                    @endforeach  
                @endif  
            </div>
            <div class="flex-1">
                <h1 class="text-5xl font-bold">Welcome to Your Dashboard!</h1>
                <p class="py-6">
                    Experience the power of modern analytics and project management in one place. Start managing your projects more efficiently today.
                </p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="tentang" class="py-16 bg-white dark:bg-gray-800 rounded-lg shadow-sm my-8">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Tentang Kami</h2>
            <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
                <p class="mb-6">
                    Sekolah Kita adalah lembaga pendidikan yang berdedikasi untuk mengembangkan potensi setiap siswa. Dengan kurikulum yang komprehensif dan fasilitas modern, kami berkomitmen untuk menciptakan lingkungan belajar yang inspiratif dan inovatif.
                </p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Didirikan sejak tahun 1990</li>
                    <li>Akreditasi A</li>
                    <li>Lebih dari 500 alumni sukses</li>
                    <li>Staf pengajar berkualifikasi tinggi</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="flex items-center justify-evenly ml-52 "> <!-- betjustify-between the grid of cards -->  
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
            @foreach($personalBrandData as $data)  
            <div class="card bg-base-100 shadow-xl dark:text-white dark:bg-gray-700">
                <div class="card-body">
                    <h2 class="card-title"> {{ $data->nama }}</h2>
                    <ul class="list-disc list-inside">
                        <li>New feature release v2.1.0</li>
                        <li>Performance improvements</li>
                        <li>Bug fixes and optimizations</li>
                    </ul>
                </div>
            </div>
            @endforeach  
        </div>  
    </div>  
    

    <!-- Facilities Section -->
    <section id="fasilitas" class="py-16 mt-10 bg-white dark:bg-gray-900 rounded-lg shadow-sm w-full mx-auto p-5">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 dark:text-white text-center">Fasilitas</h2>
        <div class="join join-vertical mx-auto w-full">
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <input type="radio" name="facilities" checked /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Perpustakaan Digital
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Akses ke ribuan buku dan sumber belajar digital.</p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <input type="radio" name="facilities" /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Laboratorium Sains
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Fasilitas lengkap untuk eksperimen dan penelitian ilmiah.</p>
                </div>
            </div>
            <div class="collapse collapse-arrow join-item border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <input type="radio" name="facilities" /> 
                <div class="collapse-title text-xl font-medium text-gray-800 dark:text-white">
                    Lapangan Olahraga
                </div>
                <div class="collapse-content text-gray-600 dark:text-gray-300"> 
                    <p>Area luas untuk berbagai aktivitas olahraga dan kegiatan outdoor.</p>
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
                    <p><strong class="text-gray-800 dark:text-white">Alamat:</strong> Jl. Pendidikan No. 123, Kota Sejahtera</p>
                    <p><strong class="text-gray-800 dark:text-white">Telepon:</strong> (021) 1234-5678</p>
                    <p><strong class="text-gray-800 dark:text-white">Email:</strong> info@sekolahkita.edu</p>
                    <p><strong class="text-gray-800 dark:text-white">Jam Operasional:</strong> Senin - Jumat, 07.00 - 16.00 WIB</p>
                </div>
                <div class="card-actions justify-end mt-6">
                    <button class="btn btn-primary">Kirim Pesan</button>
                </div>
            </div>
        </div>
    </section>
</main>


            <!-- Footer -->
    <footer class="footer footer-center dark:bg-gray-800 p-10 bg-base-200 text-base-content rounded">
        <div class="grid grid-flow-col gap-4 dark:text-white">
            <a class="link link-hover">About us</a> 
            <a class="link link-hover">Contact</a> 
            <a class="link link-hover">Jobs</a> 
            <a class="link link-hover">Press kit</a>
        </div> 
        <div>
            <div class="grid grid-flow-col gap-4 dark:text-white">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
            </div>
        </div> 
        <div>
            <p class="">Copyright © 2023 - All rights reserved by ACME Industries Ltd</p>
        </div>
    </footer>
</body>
</html>
