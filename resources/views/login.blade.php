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

<nav class="flex justify-between items-center px-10 py-4 bg-white border-b">
    <h1 class="text-green-700 font-bold text-lg">PeakRent</h1>
    <ul class="flex gap-8 text-gray-600 font-medium">
        <li><a href="/" class="hover:text-green-700">Beranda</a></li>
        <li><a href="/produk" class="hover:text-green-700">Produk</a></li>
        <li><a href="/panduan" class="hover:text-green-700">Panduan Sewa</a></li>
    </ul>
</nav>

<div class="flex justify-center px-6 py-16">
    <div class="bg-white rounded-2xl shadow-lg flex w-full max-w-5xl h-[550px] overflow-hidden">
        <div class="w-1/2 relative hidden md:block">
            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470" class="w-full h-full object-cover">
            <div class="absolute bottom-6 left-6 text-white">
                <h2 class="text-2xl font-bold">Mulai Petualanganmu!</h2>
                <p class="text-sm mt-2">Akses peralatan outdoor premium dengan PeakRent.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-green-800 mb-2">Selamat Datang</h2>
            <p class="text-gray-500 mb-6">Silahkan masuk ke akunmu untuk melanjutkan.</p>

            <form id="formLogin">
                @csrf
                <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide"> EMAIL </label>
                <input type="email" id="inputEmail" required
                    class="w-full mt-1 mb-4 p-3 rounded bg-[#E2E3DC] outline-none"
                    placeholder="Masukkan email">

                <div class="flex justify-between text-sm mb-1">
                    <label class="text-xs font-semibold text-gray-600 block mb-1 tracking-wide"> PASSWORD </label>
                </div>
                <input type="password" id="inputPassword" required
                    class="w-full mt-1 mb-6 p-3 rounded bg-[#E2E3DC] outline-none"
                    placeholder="********">

                <button type="submit" class="w-full bg-green-800 text-white py-3 rounded-lg hover:bg-green-900 transition">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun? <a href="/register" class="text-green-700 font-semibold">Daftar</a>
            </p>
        </div>
    </div>
</div>

<script>
    // PERBAIKAN: Menghubungkan Form dengan JavaScript
    const formLogin = document.getElementById('formLogin');

    formLogin.addEventListener('submit', async (e) => {
        e.preventDefault(); // Mencegah halaman refresh

        const email = document.getElementById('inputEmail').value;
        const password = document.getElementById('inputPassword').value;

        try {
            const res = await fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json' // PENTING: Supaya Laravel ngirim JSON
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            });

            const data = await res.json();
            console.log(data);

            if (res.ok) {
                alert("Login Berhasil! Selamat Datang " + data.user.nama);
                // Simpan token buat nanti sewa alat
                localStorage.setItem('access_token', data.access_token);
                window.location.href = "/produk"; 
            } else {
                alert(data.message || "Login Gagal! Periksa email & password.");
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Koneksi gagal! Pastikan 'php artisan serve' menyala.");
        }
    });
</script>

</body>
</html>