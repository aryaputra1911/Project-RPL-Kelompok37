<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>Login - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef]" style="font-family: 'Poppins', sans-serif;">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-4 bg-white border-b">
    <h1 class="text-green-700 font-bold text-lg">PeakRent</h1>

    <ul class="flex gap-8 text-gray-600 font-medium">
        <li><a href="/" class="hover:text-green-700">Beranda</a></li>
        <li><a href="/produk" class="hover:text-green-700">Produk</a></li>
        <li><a href="/panduan" class="hover:text-green-700">Panduan Sewa</a></li>
    </ul>

    <div class="flex gap-4">
        <!-- cart -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h14m-6 0a2 2 0 11-4 0m4 0a2 2 0 104 0"/>
        </svg>

        <!-- user -->
        <a href="/login" class="text-green-700 hover:text-green-900 transition -mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
    </div>
</nav>

<!-- CONTENT -->
<div class="flex justify-center px-6 py-16">

    <div class="bg-white rounded-2xl shadow-lg flex w-full max-w-5xl h-[550px] overflow-hidden">

        <!-- LEFT IMAGE -->
        <div class="w-1/2 relative hidden md:block">
            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470"
                class="w-full h-full object-cover">

            <div class="absolute bottom-6 left-6 text-white">
                <h2 class="text-2xl font-bold">Mulai Petualanganmu Bersama Kami!</h2>
                <p class="text-sm mt-2">Akses peralatan outdoor premium dan rencanakan ekspedisi selanjutnya dengan PeakRent.</p>
            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">

            <h2 class="text-2xl font-bold text-green-800 mb-2">Selamat Datang</h2>
            <p class="text-gray-500 mb-6">Silahkan masuk ke akunmu untuk melanjutkan.</p>

            @if(session('error'))
                <p class="text-red-500 mb-4">{{ session('error') }}</p>
            @endif

           
        <form id="loginForm" class="space-y-4">
            @csrf
            <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide"> EMAIL </label>
            <input type="email" id="email" name="email" required
                class="w-full mt-1 mb-4 p-3 rounded bg-[#E2E3DC] outline-none"
                placeholder="Masukkan email">

            <div class="flex justify-between text-sm mb-1">
                <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide"> PASSWORD </label>
                <span class="text-gray-400 text-xs">Lupa password?</span>
            </div>

            <input type="password" id="password" name="password" required
                class="w-full mt-1 mb-6 p-3 rounded bg-[#E2E3DC] outline-none"
                placeholder="********">

            <button type="submit" class="w-full bg-green-800 text-white py-3 rounded-lg hover:bg-green-900">
                Masuk
            </button>
        </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun? 
                <a href="/register" class="text-green-700 font-semibold">Daftar</a>
            </p>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6">

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">

        <!-- LEFT -->
        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>

        <!-- MIDDLE -->
        <div>
            <h3 class="text-white font-semibold mb-3">KATEGORI</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Tenda & Camping</li>
                <li>Tas & Carrier</li>
                <li>Pakaian Gunung</li>
                <li>Aksesoris & Gear</li>
            </ul>
        </div>

        <!-- RIGHT -->
        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-4 text-sm text-gray-300">

                <div class="flex items-center gap-3 group cursor-pointer hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 6.75-9.75-6.75" />
                        </svg>
                    </div>
                    <span>halo@peakrent.com</span>
                </div>

                <div class="flex items-center gap-3 group cursor-pointer hover:text-white transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                    <span>+62 21 5550 1234</span>
                </div>

            </div>
        </div>

    </div>

    <!-- LINE -->
    <div class="border-t border-green-700 mt-10 pt-4 flex justify-between text-xs text-gray-300">
        <span>© 2026 PeakRent Editorial. The Modern Explorer.</span>
        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat & Ketentuan</span>
        </div>
    </div>

</footer>


<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault(); // Mencegah reload halaman

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
        const res = await fetch('http://127.0.0.1:8000/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });

        const data = await res.json();

        if (res.ok) {
            // PENTING: Simpan token ke localStorage agar user tetap login
            localStorage.setItem('token', data.access_token);
            localStorage.setItem('user', JSON.stringify(data.user));

            alert("Login berhasil!");
            window.location.href = "/"; // Pindah ke beranda
        } else {
            alert(data.message || "Login gagal! Periksa email dan password.");
        }
    } catch (error) {
        alert("Terjadi kesalahan koneksi ke server.");
    }
});
</script>

</body>
</html>

</body>
</html>