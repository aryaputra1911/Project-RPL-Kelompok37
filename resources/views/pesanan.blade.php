<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pesanan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

    <!-- MAIN CONTENT -->
    <div class="px-10 py-8 flex-grow">

        <!-- TITLE -->
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Riwayat Pesanan</h1>

        <div id="pesananContainer" class="space-y-4">

            @if($pesanans->isEmpty())
                <div class="bg-white p-10 rounded-xl shadow text-center text-gray-400">
                    <p class="text-lg font-semibold text-gray-500">Belum ada pesanan</p>
                    <p class="text-sm mt-1">Anda belum memiliki riwayat pemesanan alat.</p>
                    <a href="{{ url('/produk') }}" class="inline-block mt-4 bg-green-800 text-white px-6 py-2.5 rounded-xl hover:bg-green-900 transition text-sm font-medium">
                        Lihat Produk
                    </a>
                </div>
            @else
                @foreach($pesanans as $pesanan)
                @php
                    $statusLabel = '';
                    $badgeClass = '';
                    $totalClass = 'text-gray-800';
                    $extraClass = '';
                    $showBayarBtn = false;

                    switch($pesanan->status) {
                        case 'belum_bayar':
                            $statusLabel = 'BELUM DIBAYAR';
                            $badgeClass = 'bg-[#FFF0E6] text-[#D84C10]';
                            $totalClass = 'text-[#D80000]';
                            $showBayarBtn = true;
                            break;
                        case 'menunggu_konfirmasi':
                            $statusLabel = 'MENUNGGU KONFIRMASI ADMIN';
                            $badgeClass = 'bg-[#E6F0FF] text-[#2F65CB]';
                            break;
                        case 'dikonfirmasi':
                            $statusLabel = 'DIKONFIRMASI';
                            $badgeClass = 'bg-[#E4F2E4] text-[#2D7A2D]';
                            break;
                        case 'disewa':
                            $statusLabel = 'SEDANG DISEWA';
                            $badgeClass = 'bg-[#FFF8E1] text-[#F59E0B]';
                            break;
                        case 'selesai':
                            $statusLabel = 'SELESAI';
                            $badgeClass = 'bg-[#EAEAEA] text-[#7A7A7A]';
                            $extraClass = 'opacity-60';
                            break;
                        default:
                            $statusLabel = strtoupper($pesanan->status);
                            $badgeClass = 'bg-gray-200 text-gray-500';
                    }

                    $totalBiaya = $pesanan->transaksi->total_biaya ?? 0;
                @endphp

                <div class="flex justify-between p-5 bg-[#F3F4ED] rounded-xl shadow-md {{ $extraClass }}">
                    <div class="flex-1 flex flex-col justify-center">
                        <!-- ID & Status -->
                        <div class="flex items-center mb-3">
                            <span class="font-bold text-sm text-gray-800 mr-3">#PR-{{ str_pad($pesanan->id_pesanan, 3, '0', STR_PAD_LEFT) }}</span>
                            <span class="{{ $badgeClass }} text-[9px] font-bold py-1 px-3 rounded-full uppercase tracking-wide">{{ $statusLabel }}</span>
                        </div>

                        <!-- Item -->
                        <div class="flex items-center mb-3">
                            @if($pesanan->alat && $pesanan->alat->foto)
                                <img src="{{ $pesanan->alat->foto_url }}" alt="Gambar Produk" class="w-16 h-16 object-cover rounded mr-4" onerror="this.src='https://via.placeholder.com/150'">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Gambar Produk" class="w-16 h-16 object-cover rounded mr-4">
                            @endif
                            <div>
                                <p class="text-sm font-bold text-gray-800">{{ $pesanan->alat->nama_alat ?? '-' }}</p>
                                <p class="text-xs text-gray-500">
                                    {{ $pesanan->jumlah_alat }} unit &times;
                                    {{ \Carbon\Carbon::parse($pesanan->tgl_sewa)->diffInDays(\Carbon\Carbon::parse($pesanan->tgl_kembali)) }} hari
                                </p>
                                <p class="text-xs text-gray-400 mt-1">
                                    {{ \Carbon\Carbon::parse($pesanan->tgl_sewa)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pesanan->tgl_kembali)->format('d M Y') }}
                                </p>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500">Transaksi dibuat pada {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <div class="flex flex-col justify-center items-end min-w-[150px] border-l border-gray-300 pl-4 ml-2">
                        <p class="text-[11px] text-gray-500 font-medium mb-1">Total Pembayaran</p>
                        <p class="text-lg font-bold {{ $totalClass }} mb-2">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</p>
                        
                        @if($showBayarBtn)
                        <button
                            onclick="bayarPesanan({{ $pesanan->id_pesanan }})"
                            class="bg-[#D80000] hover:bg-red-800 text-white text-[11px] font-bold py-1.5 px-6 rounded transition">
                            Bayar
                        </button>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif

        </div>

    </div>

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
function bayarPesanan(pesananId) {
    // Set pesanan_ids ke localStorage agar halaman pembayaran tahu pesanan mana yang dibayar
    let userId = "{{ Auth::id() }}";
    localStorage.setItem("pesanan_ids_" + userId, JSON.stringify([pesananId]));
    window.location.href = "{{ url('/pembayaran') }}";
}
</script>
</body>
</html>