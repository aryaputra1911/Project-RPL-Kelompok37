<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>Panduan Sewa - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef]" style="font-family: 'Poppins', sans-serif;">

<!-- NAVBAR -->
<nav class="flex justify-between items-center px-10 py-4 bg-white border-b">
    <h1 class="text-green-700 font-bold text-lg"><a href="{{ url('/') }}">PeakRent</a></h1>

    <ul class="flex gap-8 text-gray-600 font-medium">
        <li><a href="{{ url('/') }}" class="hover:text-green-700">Beranda</a></li>
        <li><a href="{{ url('/produk') }}" class="hover:text-green-700">Produk</a></li>
        <li><a href="{{ url('/panduan') }}" class="hover:text-green-700">Panduan Sewa</a></li>
        @auth
        <li><a href="{{ url('/pesanan') }}" class="hover:text-green-700">Pesanan</a></li>
        @endauth
    </ul>

    <div class="flex gap-4 items-center">
        <!-- cart -->
        <a href="{{ url('/keranjang') }}" class="relative cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h14m-6 0a2 2 0 11-4 0m4 0a2 2 0 104 0"/>
            </svg>
            <span id="cartCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] px-1.5 py-[1px] rounded-full" style="display: none;">0</span>
        </a>

        <!-- user -->
        @auth
        <div class="flex items-center gap-3 relative">
            <div onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center gap-3 cursor-pointer">
                <span class="text-sm text-gray-700">{{ Auth::user()->nama }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-green-700 hover:text-green-900 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <!-- DROPDOWN -->
            <div class="hidden absolute top-10 right-0 w-48 bg-white rounded-2xl shadow-xl p-3 border z-50">
                <div class="flex items-center gap-3 pb-3">
                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600">👤</div>
                    <div class="leading-tight">
                        <p class="font-semibold text-[13px] text-gray-800">{{ Auth::user()->nama }}</p>
                        <p class="text-[11px] text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <hr class="mb-2">
                <a href="{{ url('/pesanan') }}" class="flex items-center gap-2 text-sm text-gray-700 py-2 mb-3">↺ Riwayat Pesanan</a>
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button class="w-full bg-green-800 hover:bg-green-900 text-white py-2 rounded-lg text-sm font-medium">Keluar</button>
                </form>
            </div>
        </div>
        @else
        <a href="{{ url('/login') }}" class="text-green-700 hover:text-green-900 transition -mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
        @endauth
    </div>
</nav>

<!-- TITLE -->
<section class="px-6 md:px-10 py-10">
    <h1 class="text-3xl md:text-5xl font-bold text-[#2c3e50] mb-10">
        Panduan Sewa
    </h1>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CARD -->
        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-green-900">
            <div class="bg-green-900 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 01</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Periksa Ketersediaan Peralatan
            </h3>
            <p class="text-sm text-gray-600">
                Cek daftar peralatan di website kami untuk memastikan ketersediaan pada tanggal yang diinginkan.
            </p>
        </div>

        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-blue-950">
             <div class="bg-blue-950 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 02</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Pastikan Anda Telah Terdaftar sebagai Anggota
            </h3>
            <p class="text-sm text-gray-600">
                Hanya anggota terdaftar yang dapat melakukan transaksi penyewaan secara online.
            </p>
        </div>

        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-green-900">
            <div class="bg-green-900 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 03</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Pilih Barang dan Lakukan Transaksi melalui Website
            </h3>
            <p class="text-sm text-gray-600">
                Pilih peralatan yang dibutuhkan, masukkan ke keranjang, dan selesaikan pembayaran.
            </p>
        </div>

        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-blue-950">
           <div class="bg-blue-950 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 2v4M16 2v4M3 10h18M5 6h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 04</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Pengambilan Peralatan di Lokasi Store
            </h3>
            <p class="text-sm text-gray-600">
                Ambil barang Anda di store resmi PeakRent sesuai jadwal yang telah dikonfirmasi.
            </p>
        </div>

        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-green-900">
            <div class="bg-green-900 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 19l6-8 4 5 5-7 3 10H3zM16 5h.01" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 05</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Gunakan Peralatan dengan Tanggung Jawab
            </h3>
            <p class="text-sm text-gray-600">
                Pastikan peralatan dijaga dengan baik selama masa penggunaan untuk kenyamanan bersama.
            </p>
        </div>

        <div class="bg-[#efefe9] p-6 rounded-xl border-l-4 border-blue-950">
            <div class="bg-blue-950 w-10 h-10 flex items-center justify-center rounded mb-4 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 14l-4-4m0 0l4-4m-4 4h11a4 4 0 010 8h-1" />
                </svg>
            </div>
            <p class="text-xs text-gray-500 font-semibold">LANGKAH 06</p>
            <h3 class="font-bold text-gray-800 mt-2 mb-2">
                Pengembalian Peralatan
            </h3>
            <p class="text-sm text-gray-600">
                Kembalikan peralatan tepat waktu ke store kami untuk pengecekan kondisi akhir.
            </p>
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6 mt-16">
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
                <li>Tenda &amp; Camping</li>
                <li>Tas &amp; Carrier</li>
                <li>Pakaian Gunung</li>
                <li>Aksesoris &amp; Gear</li>
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
            <span>Syarat &amp; Ketentuan</span>
        </div>
    </div>
</footer>


<script>
function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];

    let total = 0;
    keranjang.forEach(item => {
        total += item.jumlah;
    });

    let badge = document.getElementById("cartCount");

    badge.innerText = total;

    if (total === 0) {
        badge.style.display = "none";
    } else {
        badge.style.display = "inline-block";
    }
}

function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];

    let total = 0;
    keranjang.forEach(item => {
        total += item.jumlah;
    });

    document.querySelectorAll("#cartCount").forEach(el => {
        el.innerText = total;
    });
}

function bukaKeranjang() {
    window.location.href = "{{ url('/keranjang') }}";
}

// 🔥 otomatis jalan tiap halaman dibuka
document.addEventListener("DOMContentLoaded", updateCartCount);


</script>

</body>
</html>