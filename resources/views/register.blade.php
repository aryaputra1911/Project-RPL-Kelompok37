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
                <p class="text-sm mt-2">
                    Bergabunglah dengan PeakRent yang menghargai kualitas dan kenyamanan dalam setiap langkah perjalanan.
                </p>
            </div>
        </div>

        <!-- FORM -->
        <div class="w-full md:w-1/2 p-8 flex flex-col justify-center ">

            <h2 class="text-2xl font-bold text-green-800 mb-2">
                Daftar Akun Baru
            </h2>

            <p class="text-sm text-gray-500 mb-4">
                Lengkapi data dirimu untuk mulai menyewa perlengkapan terbaik.
            </p>

        <form id="registerForm" class="space-y-3">
    @csrf

    <!-- Nama -->
    <div>
        <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide"> NAMA LENGKAP </label>
        <input type="text" name="nama" id="nama"
            class="w-full p-2.5 rounded bg-[#E2E3DC]"
            placeholder="Masukkan nama sesuai KTP">
    </div>

    <!-- Email -->
    <div>
        <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">EMAIL</label>
        <input type="email" name="email" id = "email"
            class="w-full p-2.5 rounded bg-[#E2E3DC]"
            placeholder="Masukkan email">
    </div>

    <!-- WA -->
    <div>
        <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">NOMOR WHATSAPP</label>
        <div class="flex">
            <span class="bg-gray-200 px-3 py-2.5 rounded-l">+62</span>
            <input type="text" name="no_telp" id="no_telp"
                class="w-full p-2.5 rounded-r bg-[#E2E3DC]"
                placeholder="xxxxxxxx">
        </div>
    </div>

    <!-- Password -->
    <div class="flex gap-2">
        <div class="w-1/2">
            <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">PASSWORD</label>
            <input type="password" name="password" id="password"
                class="w-full p-2.5 rounded bg-[#E2E3DC]">
        </div>

        <div class="w-1/2">
            <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide">KONFIRMASI</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full p-2.5 rounded bg-[#E2E3DC]">
        </div>
    </div>

    <!-- Button -->
    <button class="w-full bg-green-800 text-white py-2.5 rounded mt-2">
        Daftar
    </button>

    <p class="text-sm text-center mt-2">
        Sudah punya akun?
        <a href="/login" class="text-green-700 font-semibold">Masuk</a>
    </p>
</form>

        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6">

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">

        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KATEGORI</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Tenda & Camping</li>
                <li>Tas & Carrier</li>
                <li>Pakaian Gunung</li>
                <li>Aksesoris & Gear</li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-3 text-sm text-gray-300">
                <span>halo@peakrent.com</span><br>
                <span>+62 21 5550 1234</span>
            </div>
        </div>

    </div>

</footer>
<script>
    document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault(); // Menghentikan halaman agar tidak refresh

        // Mengambil data dari input berdasarkan ID
        const formData = {
            nama: document.getElementById('nama').value,
            email: document.getElementById('email').value,
            no_telp: document.getElementById('no_telp').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value
        };

        try {
            const res = await fetch('http://127.0.0.1:8000/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData) // Mengirim data yang sama seperti di Postman
            });

            const data = await res.json();

            if (res.ok) {
                alert("Registrasi Berhasil! Selamat bergabung di PeakRent.");
                window.location.href = "/login"; // Pindah ke halaman login
            } else {
                // Jika ada error validasi (misal email sudah ada)
                alert(JSON.stringify(data.errors || data.message));
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Gagal terhubung ke server. Pastikan Laravel menyala!");
        }
    });
</script>
</body>
</html>