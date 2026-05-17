<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<title>Manajemen Produk - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef] font-[Poppins]">

<!-- NAVBAR ADMIN -->
<nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white border-b">

    <a href="{{ route('admin.dashboard') }}" class="text-green-800 font-bold text-lg">
        PeakRent
    </a>

    <div class="hidden md:flex items-center gap-10 text-sm font-medium text-gray-600">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-800">
            Dashboard
        </a>

        <a href="{{ route('admin.produk') }}" class="text-green-800 border-b-2 border-green-800 pb-1">
            Produk
        </a>

        <a href="{{ route('admin.pesanan') }}" class="hover:text-green-800">
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

<!-- HEADER -->
<div class="px-10 py-8 flex justify-between items-start">
    <div>
        <h1 class="text-4xl font-bold text-gray-800">Manajemen Produk</h1>
        <p class="text-sm text-gray-600 mt-2">
            Kelola seluruh data produk dengan mudah sesuai kebutuhan.
        </p>
    </div>

    <a href="{{ route('admin.produk.tambah') }}"
       class="bg-green-800 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:bg-green-900">
        + Tambah Produk
    </a>
</div>

<!-- FLASH MESSAGE -->
@if(session('success'))
    <div class="mx-10 mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
        {{ session('success') }}
    </div>
@endif

<!-- MAIN -->
<div class="px-10 flex gap-8">

    <!-- SIDEBAR -->
    <div class="w-1/4">

        <h3 class="font-semibold mb-4 text-green-800">Kategori</h3>

        <div class="space-y-2 text-sm text-gray-600">
            <label class="flex gap-2">
                <input type="checkbox" value="tenda" onchange="filterProduk()"> Tenda &amp; Camping
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="tas" onchange="filterProduk()"> Tas &amp; Carrier
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="pakaian" onchange="filterProduk()"> Pakaian Gunung
            </label>

            <label class="flex gap-2">
                <input type="checkbox" value="aksesoris" onchange="filterProduk()"> Aksesoris &amp; Gear
            </label>
        </div>

        <div class="mt-6 bg-[#eef0ea] p-4 rounded-xl text-sm max-w-[220px]">

            <div class="mb-3 text-[#213B56]">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-5 h-5" 
                    viewBox="0 0 24 24" 
                    fill="currentColor">
                    <path fill-rule="evenodd" 
                        d="M12 2.25l2.1 2.02 2.9-.42 1.3 2.63 2.63 1.3-.42 2.9 2.02 2.1-2.02 2.1.42 2.9-2.63 1.3-1.3 2.63-2.9-.42-2.1 2.02-2.1-2.02-2.9.42-1.3-2.63-2.63-1.3.42-2.9-2.02-2.1 2.02-2.1-.42-2.9 2.63-1.3 1.3-2.63 2.9.42L12 2.25zm3.53 8.03a.75.75 0 00-1.06-1.06l-3.22 3.22-1.47-1.47a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.75-3.75z" 
                        clip-rule="evenodd" />
                </svg>
            </div>

            <h4 class="font-bold text-[#213B56] text-sm mb-2">
                Peralatan Terjamin
            </h4>

            <p class="text-gray-500 text-xs leading-relaxed">
                Semua peralatan dibersihkan dan dicek kualitasnya sebelum disewakan ke pelanggan.
            </p>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="w-3/4">

        <!-- SEARCH -->
        <div class="mb-6">
            <input type="text" id="searchInput" placeholder="Cari barang..." 
                class="w-full border p-3 rounded-lg bg-[#EDEFE7] outline-none"
                onkeyup="searchProduk()">
        </div>

        <!-- GRID PRODUK -->
        <div class="grid grid-cols-3 gap-6" id="produkGrid">

            @forelse($alats as $alat)
            <div class="produk-item" data-kategori="" data-nama="{{ strtolower($alat->nama_alat) }}">
                <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <img src="{{ $alat->foto ? asset('storage/' . $alat->foto) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                        class="w-full h-56 object-cover">

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">{{ $alat->nama_alat }}</h3>

                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-xs text-gray-500">MULAI DARI</p>
                                <p class="text-green-800 font-bold text-lg">
                                    Rp {{ number_format($alat->harga_per_hari, 0, ',', '.') }} <span class="text-sm text-gray-600">/hari</span>
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('admin.produk.edit', $alat->id_alat) }}"
                                   class="bg-[#213B56] w-9 h-9 rounded-lg flex items-center justify-center hover:bg-slate-800"
                                   title="Edit Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </a>

                                <button type="button"
                                    onclick="openDeleteModal({{ $alat->id_alat }}, '{{ addslashes($alat->nama_alat) }}')"
                                    class="bg-red-600 w-9 h-9 rounded-lg flex items-center justify-center hover:bg-red-700"
                                    title="Hapus Produk">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        class="w-4 h-4 text-white" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m3-3h4a1 1 0 011 1v2H9V5a1 1 0 011-1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            Stok: {{ $alat->stok }}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16 text-gray-400">
                <p class="text-lg">Belum ada produk</p>
                <a href="{{ route('admin.produk.tambah') }}" class="text-green-700 font-semibold hover:underline mt-2 inline-block">+ Tambah Produk Pertama</a>
            </div>
            @endforelse

        </div>

        <!-- PAGINATION -->
        <div class="flex justify-center items-center gap-2 mt-10 mb-16">
            {{ $alats->links('pagination::simple-tailwind') }}
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6">

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
                <li>Tambah Produk</li>
                <li>Edit Detail Produk</li>
                <li>Update Stok</li>
                <li>Hapus Produk</li>
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

    <div class="border-t border-green-700 mt-10 pt-4 flex justify-between text-xs text-gray-300">
        <span>&copy; 2026 PeakRent Editorial. The Modern Explorer.</span>
        <div class="flex gap-6">
            <span>Kebijakan Privasi</span>
            <span>Syarat &amp; Ketentuan</span>
        </div>
    </div>
</footer>

<!-- MODAL HAPUS PRODUK -->
<div id="deleteModal" 
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white w-[360px] rounded-xl p-8 text-center relative shadow-xl">

        <!-- CLOSE -->
        <button onclick="closeDeleteModal()" 
            class="absolute top-4 right-5 text-gray-500 hover:text-gray-800 text-xl">
            &times;
        </button>

        <!-- ICON WARNING -->
        <div class="mx-auto mb-5 w-16 h-16 rounded-full border-4 border-red-600 flex items-center justify-center">
            <span class="text-red-600 text-4xl font-bold leading-none">!</span>
        </div>

        <!-- TITLE -->
        <h2 class="text-xl font-bold text-gray-900 mb-3">
            Hapus Produk?
        </h2>

        <!-- DESCRIPTION -->
        <p class="text-sm text-gray-600 leading-relaxed mb-6">
            Kamu yakin ingin menghapus produk <strong id="deleteNamaProduk"></strong>?
            <br>
            Data yang sudah dihapus tidak dapat dikembalikan.
        </p>

        <!-- FORM HAPUS -->
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="w-full bg-red-600 text-white py-3 rounded-lg text-sm font-bold hover:bg-red-700 transition">
                Ya, Hapus
            </button>
        </form>

        <!-- BATAL -->
        <button onclick="closeDeleteModal()"
            class="mt-4 text-sm text-red-600 font-medium hover:underline">
            Batal
        </button>

    </div>
</div>

<script>
function filterProduk() {
    let kategoriDipilih = Array.from(
        document.querySelectorAll('input[type=checkbox]:checked')
    ).map(cb => cb.value);

    document.querySelectorAll('.produk-item').forEach(item => {
        let kategori = item.dataset.kategori;

        if (kategoriDipilih.length === 0 || kategoriDipilih.includes(kategori)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

function searchProduk() {
    let keyword = document.getElementById('searchInput').value.toLowerCase();
    document.querySelectorAll('.produk-item').forEach(item => {
        let nama = item.dataset.nama || '';
        item.style.display = nama.includes(keyword) ? '' : 'none';
    });
}

function openDeleteModal(id, nama) {
    document.getElementById('deleteNamaProduk').textContent = nama;
    document.getElementById('deleteForm').action = '{{ url("/admin/produk/hapus") }}/' + id;

    const modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

</body>
</html>