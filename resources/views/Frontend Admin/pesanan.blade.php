<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Admin - PeakRent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef] font-[Poppins] text-gray-800">

<!-- NAVBAR ADMIN -->
<nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white border-b">

    <a href="{{ route('admin.dashboard') }}" class="text-green-900 font-bold text-lg">
        PeakRent
    </a>

    <div class="hidden md:flex items-center gap-10 text-sm font-medium text-gray-600">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-800">
            Dashboard
        </a>

        <a href="{{ route('admin.produk') }}" class="hover:text-green-800">
            Produk
        </a>

        <a href="{{ route('admin.pesanan') }}" class="text-green-800 border-b-2 border-green-800 pb-1">
            Pesanan
        </a>
    </div>

    <div class="flex items-center gap-3 relative">
        <div onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
            <span>{{ Auth::user()->nama ?? 'admin' }}</span>
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.879 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div class="hidden absolute top-10 right-0 w-44 bg-white rounded-xl shadow-xl p-3 border z-50">
            <p class="text-xs text-gray-500 mb-2">{{ Auth::user()->email ?? '' }}</p>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg text-sm font-medium">Keluar</button>
            </form>
        </div>
    </div>

</nav>

<!-- CONTENT -->
<main class="px-10 py-12 min-h-screen">

    <!-- FLASH MESSAGE -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-8">
        <div>
            <h1 class="text-4xl font-bold text-[#213B56]">
                Pesanan Masuk
            </h1>

            <p class="text-sm text-gray-600 mt-2">
                Kelola pesanan agar tetap terorganisir dan terpantau.
            </p>
        </div>

        <!-- SEARCH -->
        <div class="w-full md:w-[300px]">
            <div class="flex items-center bg-[#ecece3] rounded-lg px-4 py-3">
                <input type="text" id="searchInput" placeholder="Cari sesuatu..."
                    class="w-full bg-transparent outline-none text-sm text-gray-600 placeholder:text-gray-400"
                    onkeyup="searchPesanan()">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- FILTER STATUS -->
    <div class="flex items-center gap-3 mb-8 text-sm bg-[#efefe6] w-fit rounded-xl p-2 flex-wrap">

        <a href="{{ route('admin.pesanan') }}"
            class="filter-btn px-4 py-2 rounded-lg {{ !request('status') ? 'bg-[#213B56] text-white' : 'text-gray-500 hover:bg-[#213B56] hover:text-white' }} font-semibold transition">
            Semua
            <span class="ml-1 text-[10px] opacity-70">({{ $totalPesanan }})</span>
        </a>

        <a href="{{ route('admin.pesanan', ['status' => 'belum_bayar']) }}"
            class="filter-btn px-4 py-2 rounded-lg {{ request('status') == 'belum_bayar' ? 'bg-[#D84C10] text-white' : 'text-gray-500 hover:bg-[#D84C10] hover:text-white' }} font-semibold transition">
            Belum Dibayar
            @if($countBelumBayar > 0)
            <span class="ml-1 bg-red-500 text-white text-[9px] px-1.5 py-0.5 rounded-full">{{ $countBelumBayar }}</span>
            @endif
        </a>

        <a href="{{ route('admin.pesanan', ['status' => 'menunggu_konfirmasi']) }}"
            class="filter-btn px-4 py-2 rounded-lg {{ request('status') == 'menunggu_konfirmasi' ? 'bg-[#2F65CB] text-white' : 'text-gray-500 hover:bg-[#2F65CB] hover:text-white' }} font-semibold transition">
            Menunggu Konfirmasi
            @if($countMenunggu > 0)
            <span class="ml-1 bg-blue-500 text-white text-[9px] px-1.5 py-0.5 rounded-full">{{ $countMenunggu }}</span>
            @endif
        </a>

        <a href="{{ route('admin.pesanan', ['status' => 'dikonfirmasi']) }}"
            class="filter-btn px-4 py-2 rounded-lg {{ request('status') == 'dikonfirmasi' ? 'bg-[#2D7A2D] text-white' : 'text-gray-500 hover:bg-[#2D7A2D] hover:text-white' }} font-semibold transition">
            Dikonfirmasi
            @if($countDikonfirmasi > 0)
            <span class="ml-1 bg-green-500 text-white text-[9px] px-1.5 py-0.5 rounded-full">{{ $countDikonfirmasi }}</span>
            @endif
        </a>

        <a href="{{ route('admin.pesanan', ['status' => 'disewa']) }}"
            class="filter-btn px-4 py-2 rounded-lg {{ request('status') == 'disewa' ? 'bg-[#F59E0B] text-white' : 'text-gray-500 hover:bg-[#F59E0B] hover:text-white' }} font-semibold transition">
            Sedang Disewa
            @if($countDisewa > 0)
            <span class="ml-1 bg-amber-500 text-white text-[9px] px-1.5 py-0.5 rounded-full">{{ $countDisewa }}</span>
            @endif
        </a>

        <a href="{{ route('admin.pesanan', ['status' => 'selesai']) }}"
            class="filter-btn px-4 py-2 rounded-lg {{ request('status') == 'selesai' ? 'bg-[#213B56] text-white' : 'text-gray-500 hover:bg-[#213B56] hover:text-white' }} font-semibold transition">
            Selesai
            <span class="ml-1 text-[10px] opacity-70">({{ $countSelesai }})</span>
        </a>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#efefe6] text-gray-400 uppercase text-xs tracking-widest">
                        <th class="text-left px-6 py-5 font-semibold">Nomor ID</th>
                        <th class="text-left px-6 py-5 font-semibold">Penyewa</th>
                        <th class="text-left px-6 py-5 font-semibold">Tanggal Sewa</th>
                        <th class="text-left px-6 py-5 font-semibold">Alat</th>
                        <th class="text-left px-6 py-5 font-semibold">Qty</th>
                        <th class="text-left px-6 py-5 font-semibold">Total Harga</th>
                        <th class="text-left px-6 py-5 font-semibold">Status Pesanan</th>
                        <th class="text-left px-6 py-5 font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700">

                    @forelse($pesanans as $p)
                    <tr class="pesanan-row border-b border-gray-100 hover:bg-gray-50 transition" data-status="{{ $p->status }}" data-nama="{{ strtolower($p->user->nama ?? '') }}">
                        <td class="px-6 py-5 font-bold text-gray-900">#PR-{{ str_pad($p->id_pesanan, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-5">
                            <div>
                                <p class="font-medium">{{ $p->user->nama ?? '-' }}</p>
                                <p class="text-xs text-gray-400">{{ $p->user->email ?? '' }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div>
                                <p>{{ \Carbon\Carbon::parse($p->tgl_sewa)->format('d M') }} - {{ \Carbon\Carbon::parse($p->tgl_kembali)->format('d M Y') }}</p>
                                <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($p->tgl_sewa)->diffInDays(\Carbon\Carbon::parse($p->tgl_kembali)) }} hari</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">{{ $p->alat->nama_alat ?? '-' }}</td>
                        <td class="px-6 py-5">{{ $p->jumlah_alat }} unit</td>
                        <td class="px-6 py-5 font-medium">
                            Rp {{ number_format($p->transaksi->total_biaya ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-5">
                            @if($p->status == 'belum_bayar')
                                <span class="inline-flex items-center gap-1 bg-[#FFF0E6] text-[#D84C10] text-xs font-bold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-[#D84C10] rounded-full"></span>
                                    Belum Dibayar
                                </span>
                            @elseif($p->status == 'menunggu_konfirmasi')
                                <span class="inline-flex items-center gap-1 bg-[#E6F0FF] text-[#2F65CB] text-xs font-bold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-[#2F65CB] rounded-full animate-pulse"></span>
                                    Menunggu Konfirmasi
                                </span>
                            @elseif($p->status == 'dikonfirmasi')
                                <span class="inline-flex items-center gap-1 bg-[#E4F2E4] text-[#2D7A2D] text-xs font-bold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-[#2D7A2D] rounded-full"></span>
                                    Dikonfirmasi
                                </span>
                            @elseif($p->status == 'disewa')
                                <span class="inline-flex items-center gap-1 bg-[#FFF8E1] text-[#F59E0B] text-xs font-bold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-[#F59E0B] rounded-full animate-pulse"></span>
                                    Sedang Disewa
                                </span>
                            @elseif($p->status == 'selesai')
                                <span class="inline-flex items-center gap-1 bg-[#EAEAEA] text-[#7A7A7A] text-xs font-bold px-3 py-1.5 rounded-full">
                                    <span class="w-2 h-2 bg-[#7A7A7A] rounded-full"></span>
                                    Selesai
                                </span>
                            @else
                                <span class="text-gray-400">{{ $p->status }}</span>
                            @endif
                        </td>

                        <td class="px-6 py-5 aksi-cell">
                            @if($p->status == 'belum_bayar')
                                <span class="text-xs text-gray-400 italic">Menunggu pembayaran user</span>

                            @elseif($p->status == 'menunggu_konfirmasi')
                                <form method="POST" action="{{ route('admin.pesanan.updateStatus', $p->id_pesanan) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="dikonfirmasi">
                                    <button type="submit"
                                        class="bg-green-700 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-green-800 transition shadow-sm">
                                        ✓ Konfirmasi
                                    </button>
                                </form>

                            @elseif($p->status == 'dikonfirmasi')
                                <form method="POST" action="{{ route('admin.pesanan.updateStatus', $p->id_pesanan) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="disewa">
                                    <button type="submit"
                                        class="bg-amber-500 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-amber-600 transition shadow-sm">
                                        🔑 Serahkan Alat
                                    </button>
                                </form>

                            @elseif($p->status == 'disewa')
                                <form method="POST" action="{{ route('admin.pesanan.updateStatus', $p->id_pesanan) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="selesai">
                                    <button type="submit"
                                        class="bg-[#e3e4dc] text-gray-600 px-4 py-2 rounded-lg text-xs font-semibold hover:bg-gray-300 transition">
                                        ✓ Tandai Selesai
                                    </button>
                                </form>

                            @else
                                <span class="text-gray-400 text-xs">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-8 py-10 text-center text-gray-400">
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- TABLE FOOTER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 px-8 py-6">
            <p class="text-sm text-gray-600">
                Menampilkan {{ $pesanans->count() }} dari {{ $totalPesanan }} pesanan
            </p>

            <div>
                {{ $pesanans->appends(request()->query())->links('pagination::simple-tailwind') }}
            </div>
        </div>

    </div>

</main>

<!-- FOOTER -->
<footer class="bg-green-950 text-gray-200 px-10 pt-12 pb-6">

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">

        <div>
            <h3 class="text-white font-bold mb-3">PeakRent</h3>
            <p class="text-sm text-gray-300 leading-relaxed max-w-xs">
                Dengan perlengkapan terbaik dan layanan terpercaya, PeakRent menjadi pilihan tepat bagi para pendaki yang mengutamakan kenyamanan dan keamanan.
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KATEGORI</h3>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>Tenda &amp; Camping</li>
                <li>Tas &amp; Carrier</li>
                <li>Pakaian Gunung</li>
                <li>Aksesoris &amp; Gear</li>
            </ul>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">KONTAK</h3>
            <div class="space-y-3 text-sm text-gray-300">
                <span class="block">halo@peakrent.com</span>
                <span class="block">+62 21 5550 1234</span>
            </div>
        </div>

    </div>

    <div class="border-t border-green-700 mt-10 pt-4 flex justify-between text-xs text-gray-300">
        <span>&copy; 2026 PeakRent Editorial. The Modern Explorer.</span>

        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat &amp; Ketentuan</span>
        </div>
    </div>

</footer>

<script>
    function searchPesanan() {
        let keyword = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('.pesanan-row').forEach(row => {
            let nama = row.dataset.nama || '';
            let status = row.dataset.status || '';
            row.style.display = (nama.includes(keyword) || status.includes(keyword)) ? '' : 'none';
        });
    }
</script>

</body>
</html>