<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PeakRent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TANPA FILE CSS, pakai Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

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

<!-- HERO -->
<section class="relative h-[500px] bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470');">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 flex flex-col justify-center h-full px-10 text-green-900">
        <span class="bg-white px-3 py-1 w-max rounded text-sm font-bold">SEWA ALAT PENDAKIAN</span>
        
        <h1 class="text-5xl font-bold mt-4 text-white">PeakRent</h1>
        
        <p class="mt-3 max-w-lg text-gray-200">
            Fokus pada perjalanan dan pengalaman, biarkan kami yang menyediakan perlengkapan terbaik untuk setiap langkah pendakian.
        </p>

        <button 
            style="background: linear-gradient(90deg, rgba(20, 75, 120, 1) 0%, rgba(7, 82, 52, 1) 49%, rgba(7, 94, 68, 1) 61%, rgba(29, 97, 25, 1) 81%, rgba(17, 97, 10, 1) 89%, rgba(7, 66, 5, 1) 100%);"
            class="mt-6 text-white px-10 py-3 rounded-xl font-bold w-max shadow-lg hover:brightness-110 transition-all">
            Sewa Sekarang
        </button>
    </div>
</section>

<!-- BRAND -->
<section class="bg-[#eaeae0] py-10 px-10">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        
        <!-- LEFT TEXT -->
        <div>
            <h3 class="text-green-800 font-bold tracking-wide">
                PILIHAN BRAND
            </h3>
            <p class="text-gray-500 text-sm mt-2 max-w-xs">
                Kami hanya menyediakan perlengkapan dari produsen outdoor ternama di dunia.
            </p>
        </div>

        <!-- BRAND LIST -->
        <div class="flex gap-10 text-gray-500 font-semibold">
            <span>THE NORTH FACE</span>
            <span>MAMMUT</span>
            <span>OSPREY</span>
            <span>ARC'TERYX</span>
        </div>

    </div>
</section>

<!-- WHY SECTION -->
<section class="bg-[#F9F9F7] py-20 px-10 text-center">

    <!-- TITLE -->
    <h2 class="text-3xl font-bold text-gray-800">
        Kenapa Harus PeakRent?
    </h2>

    <!-- LINE -->
    <div class="w-12 h-1 bg-green-700 mx-auto mt-3 mb-12 rounded"></div>

    <!-- CARDS -->
    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">

        <!-- CARD 1 -->
        <div class="bg-white p-10 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] text-left hover:shadow-md transition-shadow">
            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                
                <!-- ICON -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21a3.745 3.745 0 0 1-3.068-1.593 3.745 3.745 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.745 3.745 0 0 1 3.296-1.043A3.745 3.745 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.745 3.745 0 0 1 3.296 1.043 3.745 3.745 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
            </div>
            <h3 class="font-bold text-xl text-gray-800 mb-3">
                Lengkap & Berkualitas
            </h3>
            <p class="text-gray-500 leading-relaxed text-sm">
                Dari tenda, carrier, sleeping bag, hingga alat masak - semua tersedia dengan kualitas terbaik.
            </p>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white p-8 rounded-xl shadow-sm text-left">
            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                
                <!-- ICON -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
            </div>

            <h3 class="font-bold text-xl text-gray-800 mb-3">Harga Terjangkau</h3>
            <p class="text-gray-500 leading-relaxed text-sm">
                Nikmati pengalaman mendaki tanpa harus beli mahal. Harga jelas, tanpa biaya tersembunyi.
            </p>
        </div>

        <!-- CARD 3 -->
        <div class="bg-white p-8 rounded-xl shadow-sm text-left">
            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                
                <!-- ICON -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>

            <h3 class="font-bold text-xl text-gray-800 mb-3">Praktis & Siap Pakai</h3>
            <p class="text-gray-500 leading-relaxed text-sm">
                Semua perlengkapan sudah dicek dan dibersihkan, jadi kamu tinggal pakai tanpa ribet.
            </p>
        </div>

    </div>

</section>

    <!-- KUNJUNGI KAMI -->
    <section class="relative py-16 px-10 mb-20 overflow-hidden bg-cover bg-center" 
         style="background: 
            /* Layer 1: Gambar Peta Transparan (Inverted/White Map) */
            url('https://images.unsplash.com/photo-1742415105826-0d588fa879b9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cm91dGUlMjBtYXB8ZW58MHx8MHx8fDA%3D') no-repeat center center / cover,
            /* Layer 2: Warna Biru Gelap yang Solid di Belakang Peta */
            #0B212D;
            /* Efek Transparency & Blend agar Peta tidak terlalu mencolok */
            background-blend-mode: overlay; 
            opacity: 0.95;">

        <div class="relative max-w-6xl mx-auto">
            <div class="bg-white/10 border border-white/20 backdrop-blur-xl rounded-[2.5rem] p-12 text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8">
                
                <div class="flex-1">
                    <h2 class="text-5xl font-bold mb-6">Kunjungi Kami</h2>
                    <p class="text-gray-300 text-lg mb-10 leading-relaxed">
                        Ingin mencoba perlengkapan secara langsung atau konsultasi <br class="hidden md:block">
                        jalur pendakian? Tim ahli siap menyambutmu di store resmi kami.
                    </p>

                    <div class="space-y-4 text-gray-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>Jl. Rimba No. 42, Jakarta Selatan</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Buka Setiap Hari: 08:00 - 20:00 WIB</span>
                        </div>
                    </div>
                </div>

                <div class="shrink-0">
                    <a href="https://maps.google.com" target="_blank" 
                    class="bg-white text-[#0B212D] px-10 py-4 rounded-full font-bold text-lg shadow-xl hover:bg-gray-100 transition-all flex items-center gap-2">
                    Lokasi PeakRent
                    </a>
                </div>

            </div>
        </div>
        </section>

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
function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
    let total = 0;
    
    keranjang.forEach(item => {
        total += item.jumlah;
    });

    let badge = document.getElementById("cartCount");
    if (badge) {
        if (total > 0) {
            badge.innerText = total;
            badge.style.display = "inline-block";
        } else {
            badge.style.display = "none";
        }
    }
}

// Jalankan saat halaman dimuat
document.addEventListener("DOMContentLoaded", updateCartCount);
</script>

</body>
</html>