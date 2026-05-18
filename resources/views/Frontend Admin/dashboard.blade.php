<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PeakRent</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bar {
            width: 10px;
            border-radius: 6px 6px 0 0;
        }
    </style>
</head>
<body class="bg-[#f6f6f1] text-slate-700">

    <!-- NAVBAR -->
    <nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white border-b">

    <a href="{{ route('admin.dashboard') }}" class="text-green-700 font-bold text-lg">PeakRent</a>

            <!-- MENU -->
            <div class="hidden md:flex items-center gap-10 text-sm font-medium text-slate-600">
                <a href="{{ route('admin.dashboard') }}" class="text-green-800 border-b-2 border-green-800 pb-1">
                    Dashboard
                </a>
                <a href="{{ route('admin.produk') }}" class="hover:text-green-800 transition">
                    Produk
                </a>
                <a href="{{ route('admin.pesanan') }}" class="hover:text-green-800 transition">
                    Pesanan
                </a>
            </div>

            <!-- PROFILE -->
            <div class="flex items-center gap-3 relative">
                <div onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                    <span>{{ Auth::guard('admin')->user()->nama ?? 'admin' }}</span>
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
                    <p class="text-xs text-gray-500 mb-2">{{ Auth::guard('admin')->user()->email ?? '' }}</p>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg text-sm font-medium">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main class="mx-4 bg-[#f6f6f1] min-h-screen px-6 py-8">
        
        <!-- FLASH MESSAGE -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- TOP SECTION -->
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
            <div>
                <h1 class="text-5xl font-bold text-slate-800 leading-tight">
                    Ringkasan Petualangan
                </h1>
                <p class="mt-2 text-base text-slate-600">
                    Pantau pergerakan alat dan performa pendapatan untuk musim ekspedisi saat ini.
                </p>
            </div>

            <div class="w-full lg:w-[300px]">
                <div class="flex items-center bg-[#ecece3] rounded-xl px-5 py-4">
                    <input type="text" placeholder="Cari sesuatu..."
                        class="w-full bg-transparent outline-none text-sm text-slate-600 placeholder:text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- STAT CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
            
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-xs tracking-[0.2em] uppercase text-slate-400 font-semibold mb-3">
                            Total Pendapatan
                        </p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-4xl font-bold text-green-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                    <div class="text-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 6a2 2 0 012-2h16a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm2 1v8h16V7H4zm2 2h4v2H6V9z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-xs tracking-[0.2em] uppercase text-slate-400 font-semibold mb-3">
                            Total Pesanan
                        </p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-4xl font-bold text-green-800">{{ $totalPesanan }}</h3>
                        </div>
                    </div>
                    <div class="text-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 4a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3V9l-5-5H7zm7 1.5L18.5 10H15a1 1 0 01-1-1V5.5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-xs tracking-[0.2em] uppercase text-slate-400 font-semibold mb-3">
                            Sewa Aktif
                        </p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-4xl font-bold text-green-800">{{ $sewaAktif }}</h3>
                            <span class="text-sm text-slate-600 font-medium">Alat Disewa</span>
                        </div>
                    </div>
                    <div class="text-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 2h10l5 20h-4l-1-4H7l-1 4H2L7 2zm1 12h8l-2-8h-4l-2 8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHART SECTION -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-8">
            
            <!-- BAR CHART -->
            <div class="xl:col-span-2 bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Performa Pendapatan</h2>
                        <p class="text-sm text-slate-400 mt-1">
                            Perbandingan Minggu ini dan Minggu lalu
                        </p>
                    </div>

                    <div class="flex items-center gap-4 text-xs font-semibold">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-green-800 inline-block"></span>
                            <span class="text-slate-600">MINGGU INI</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-600 inline-block"></span>
                            <span class="text-slate-600">MINGGU LALU</span>
                        </div>
                    </div>
                </div>

                <!-- chart -->
                <div class="h-[320px] flex items-end justify-between px-4 pt-8">
                    @php
                        $hari = ['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'];
                        $mingguLalu = [45, 60, 38, 78, 55, 98, 70];
                        $mingguIni  = [70, 55, 85, 105, 92, 130, 115];
                    @endphp

                    @foreach($hari as $i => $namaHari)
                    <div class="flex flex-col items-center gap-3">
                        <div class="flex items-end gap-2 h-[220px]">
                            <div class="bar bg-red-600" style="height: {{ $mingguLalu[$i] }}px"></div>
                            <div class="bar bg-green-800" style="height: {{ $mingguIni[$i] }}px"></div>
                        </div>
                        <span class="text-xs text-slate-500 font-medium">{{ $namaHari }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- DONUT CHART -->
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <h2 class="text-2xl font-bold text-slate-800 text-center mb-6">
                    Distribusi Alat
                </h2>

                @php
                    $totalAlatDistribusi = $kategoriDistribusi->sum('jumlah') ?: 1;
                    $colors = ['#065f46', '#dc2626', '#1d4ed8', '#d1d5db', '#f59e0b', '#8b5cf6'];
                    $colorClasses = ['bg-green-800', 'bg-red-600', 'bg-blue-700', 'bg-slate-300', 'bg-amber-500', 'bg-violet-500'];
                    $gradientParts = [];
                    $cumulative = 0;
                    foreach ($kategoriDistribusi as $idx => $kat) {
                        $pct = round(($kat->jumlah / $totalAlatDistribusi) * 100);
                        $color = $colors[$idx % count($colors)];
                        $gradientParts[] = "$color {$cumulative}% " . ($cumulative + $pct) . "%";
                        $cumulative += $pct;
                    }
                    if ($cumulative < 100 && count($gradientParts) > 0) {
                        $lastColor = $colors[(count($kategoriDistribusi)-1) % count($colors)];
                        $gradientParts[count($gradientParts)-1] = "$lastColor " . ($cumulative - round(($kategoriDistribusi->last()->jumlah / $totalAlatDistribusi) * 100)) . "% 100%";
                    }
                    $gradient = implode(', ', $gradientParts);
                @endphp

                <div class="flex justify-center mb-6">
                    <div class="relative w-52 h-52">
                        <div class="w-52 h-52 rounded-full"
                            style="background: conic-gradient({{ $gradient ?: '#d1d5db 0% 100%' }});">
                        </div>
                        <div class="absolute inset-5 bg-white rounded-full flex flex-col items-center justify-center">
                            <span class="text-xs tracking-wide uppercase text-slate-400 font-semibold">Total Alat</span>
                            <span class="text-4xl font-bold text-slate-800">{{ $totalAlat }}</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-3 text-sm">
                    @forelse($kategoriDistribusi as $idx => $kat)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full {{ $colorClasses[$idx % count($colorClasses)] }} inline-block"></span>
                            <span>{{ ucfirst($kat->kategori ?? 'Lainnya') }}</span>
                        </div>
                        <span class="font-semibold">{{ round(($kat->jumlah / $totalAlatDistribusi) * 100) }}%</span>
                    </div>
                    @empty
                    <p class="text-center text-gray-400 text-sm">Belum ada data kategori</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-slate-800">
                    Pesanan Terbaru
                </h2>
                <a href="{{ route('admin.pesanan') }}" class="text-green-700 font-semibold text-sm hover:underline">
                    Lihat Semua Pesanan
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[#efefe6] text-slate-400 uppercase text-xs tracking-wider">
                            <th class="text-left px-6 py-4 font-semibold">Nomor ID</th>
                            <th class="text-left px-6 py-4 font-semibold">Penyewa</th>
                            <th class="text-left px-6 py-4 font-semibold">Tanggal Sewa</th>
                            <th class="text-left px-6 py-4 font-semibold">Alat</th>
                            <th class="text-left px-6 py-4 font-semibold">Status Pesanan</th>
                            <th class="text-left px-6 py-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-700">
                        @forelse($pesananTerbaru as $p)
                        <tr class="border-b border-slate-100">
                            <td class="px-6 py-5 font-semibold">#PR-{{ str_pad($p->id_pesanan, 3, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-5">{{ $p->user->nama ?? '-' }}</td>
                            <td class="px-6 py-5">
                                {{ \Carbon\Carbon::parse($p->tgl_sewa)->format('d M') }} - {{ \Carbon\Carbon::parse($p->tgl_kembali)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-5">{{ $p->alat->nama_alat ?? '-' }}</td>
                            <td class="px-6 py-5">
                                @if($p->status == 'pending')
                                    <span class="text-amber-600 font-medium">Menunggu Konfirmasi</span>
                                @elseif($p->status == 'disewa')
                                    <span class="text-blue-600 font-medium">Sudah Dikonfirmasi</span>
                                @else
                                    <span class="text-green-600 font-medium">Selesai</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                @if($p->status == 'pending')
                                    <form method="POST" action="{{ route('admin.pesanan.updateStatus', $p->id_pesanan) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="disewa">
                                        <button type="submit" class="text-green-700 font-semibold hover:underline">Konfirmasi</button>
                                    </form>
                                @elseif($p->status == 'disewa')
                                    <form method="POST" action="{{ route('admin.pesanan.updateStatus', $p->id_pesanan) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="selesai">
                                        <button type="submit" class="text-slate-400 font-medium hover:underline">Tandai Selesai</button>
                                    </form>
                                @else
                                    <span class="text-slate-400 font-medium">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                                Belum ada pesanan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

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