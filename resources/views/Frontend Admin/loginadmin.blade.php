<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Login Admin - PeakRent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef] font-[Poppins]">

<!-- NAVBAR ADMIN -->
<nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white border-b">

    <div class="text-green-700 font-bold text-lg">PeakRent</div>

        <!-- MENU -->
        <div class="hidden md:flex items-center gap-10 text-sm font-medium text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-green-800 transition">
                Dashboard
            </a>

            <a href="{{ route('admin.produk') }}" class="hover:text-green-800 transition">
                Produk
            </a>

            <a href="{{ route('admin.pesanan') }}" class="hover:text-green-800 transition">
                Pesanan
            </a>
        </div>

        <!-- ICON PROFILE / LOGIN -->
        <a href="{{ route('admin.login') }}" class="flex items-center gap-2 text-green-800 font-semibold hover:text-green-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-6 h-6" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2"
                      d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>

            <span class="hidden md:inline">Admin</span>
        </a>

    </div>
</nav>

<!-- CONTENT -->
<div class="flex justify-center px-6 py-16">

    <div class="bg-white rounded-2xl shadow-lg flex w-full max-w-5xl h-[550px] overflow-hidden">

        <!-- LEFT IMAGE -->
        <div class="w-1/2 relative hidden md:block">
            <img src="https://admin.gearberg.com/assets/img/blog/01.-GUNUNG-MERBABU-scaled_1733111190.jpg"
                class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-green-950/40"></div>

            <div class="absolute bottom-8 left-8 right-8 text-white">
                <h2 class="text-2xl font-bold leading-snug">
                    Selamat Datang, Admin PeakRent!
                </h2>
                <p class="text-sm mt-3 leading-relaxed">
                    Kelola produk, perbarui stok, dan konfirmasi pesanan penyewaan perlengkapan outdoor dengan mudah.
                </p>
            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">

            <h2 class="text-2xl font-bold text-green-800 mb-2">
                Login Admin
            </h2>

            <p class="text-gray-500 mb-6">
                Silakan masuk menggunakan akun admin toko.
            </p>

            @if(session('error'))
                <p class="text-red-500 mb-4 text-sm">{{ session('error') }}</p>
            @endif

            @if(session('success'))
                <p class="text-green-600 mb-4 text-sm">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">
                    EMAIL
                </label>

                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full mt-1 mb-4 p-3 rounded bg-[#E2E3DC] outline-none focus:ring-2 focus:ring-green-800"
                    placeholder="Masukkan email admin" required>

                @error('email')
                    <p class="text-red-500 text-xs -mt-3 mb-3">{{ $message }}</p>
                @enderror

                <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">
                    PASSWORD
                </label>

                <input type="password" name="password"
                    class="w-full mt-1 mb-6 p-3 rounded bg-[#E2E3DC] outline-none focus:ring-2 focus:ring-green-800"
                    placeholder="Masukkan password" required>

                @error('password')
                    <p class="text-red-500 text-xs -mt-5 mb-3">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full bg-[#064E3B] text-white py-3 rounded-lg hover:bg-green-950 transition">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Khusus akun admin toko PeakRent
            </p>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="w-full bg-[#064E3B] text-gray-200 px-10 pt-12 pb-6">

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">

        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">FITUR ADMIN</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Kelola Produk</li>
                <li>Update Stok</li>
                <li>Konfirmasi Pesanan</li>
                <li>Kelola Data Penyewaan</li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-3 text-sm text-gray-300">
                <div class="flex items-center gap-3">
                    <span>halo@peakrent.com</span>
                </div>

                <div class="flex items-center gap-3">
                    <span>+62 21 5550 1234</span>
                </div>
            </div>
        </div>

    </div>

    <div class="border-t border-green-700 mt-10 pt-4 flex flex-col md:flex-row justify-between gap-3 text-xs text-gray-300">
        <span>&copy; 2026 PeakRent Editorial. The Modern Explorer.</span>
        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat &amp; Ketentuan</span>
        </div>
    </div>

</footer>

</body>
</html>