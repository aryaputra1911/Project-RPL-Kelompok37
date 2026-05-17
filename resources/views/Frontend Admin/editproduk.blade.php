<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - PeakRent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef] font-[Poppins] text-gray-800">

<!-- NAVBAR ADMIN -->
<nav class="mx-4 mt-2 bg-white">
    <div class="px-6 py-4 flex items-center justify-between">

        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-green-800">
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

    </div>
</nav>

<!-- CONTENT -->
<main class="px-10 py-8">

    <!-- BACK -->
    <a href="{{ route('admin.produk') }}" class="text-sm text-gray-600 hover:text-green-800 flex items-center gap-2 mb-6">
        <span>&larr;</span>
        <span>Kembali</span>
    </a>

    <!-- TITLE -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-[#213B56]">
            Edit Produk
        </h1>
        <p class="text-sm text-gray-600 mt-2">
            Edit informasi produk agar tetap akurat dan terbaru.
        </p>
    </div>

    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.produk.update', $alat->id_alat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            <!-- LEFT IMAGE -->
            <div class="lg:col-span-2">

                <img id="previewGambar"
                     src="{{ $alat->gambar ? asset('storage/' . $alat->gambar) : 'https://via.placeholder.com/400x360?text=No+Image' }}"
                     class="w-full h-[360px] object-cover rounded-lg">

                <div class="grid grid-cols-2 gap-4 mt-6">
                    <label for="gambar"
                        class="bg-[#213B56] text-white py-3 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 cursor-pointer hover:bg-[#162b40] transition">
                        &#8635; Ganti Gambar
                    </label>

                    <button type="button"
                        onclick="clearImage()"
                        class="bg-red-600 text-white py-3 rounded-lg text-sm font-semibold hover:bg-red-700">
                        &#128465; Hapus Gambar
                    </button>
                </div>

                <input type="file" id="gambar" name="gambar" class="hidden" onchange="previewFile(event)">

            </div>

            <!-- RIGHT FORM -->
            <div class="lg:col-span-3 bg-[#f8f8f3] rounded-xl p-6">

                <!-- INFORMASI UMUM -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 text-green-800 font-bold text-sm mb-3">
                        <span>&#9432;</span>
                        <h2>INFORMASI UMUM</h2>
                    </div>

                    <div class="border-t border-gray-300 pt-5">
                        <label class="text-xs font-bold text-gray-700 tracking-wide">
                            NAMA PRODUK
                        </label>

                        <input type="text" name="nama_produk"
                            value="{{ old('nama_produk', $alat->nama_alat) }}"
                            class="w-full mt-2 mb-5 p-3 rounded bg-[#e3e4dc] outline-none text-sm">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs font-bold text-gray-700 tracking-wide">
                                    KATEGORI
                                </label>

                                <select name="kategori"
                                    class="w-full mt-2 p-3 rounded bg-[#e3e4dc] outline-none text-sm text-gray-700">
                                    <option value="tenda" {{ old('kategori', $alat->kategori) == 'tenda' ? 'selected' : '' }}>Tenda &amp; Camping</option>
                                    <option value="tas" {{ old('kategori', $alat->kategori) == 'tas' ? 'selected' : '' }}>Tas &amp; Carrier</option>
                                    <option value="pakaian" {{ old('kategori', $alat->kategori) == 'pakaian' ? 'selected' : '' }}>Pakaian Gunung</option>
                                    <option value="aksesoris" {{ old('kategori', $alat->kategori) == 'aksesoris' ? 'selected' : '' }}>Aksesoris &amp; Gear</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-700 tracking-wide">
                                    HARGA (PER HARI)
                                </label>

                                <input type="number" name="harga"
                                    value="{{ old('harga', $alat->harga_perhari) }}"
                                    class="w-full mt-2 p-3 rounded bg-[#e3e4dc] outline-none text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DESKRIPSI PRODUK -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 text-green-800 font-bold text-sm mb-3">
                        <span>&#9636;</span>
                        <h2>DESKRIPSI PRODUK</h2>
                    </div>

                    <div class="border-t border-gray-300 pt-5">
                        <textarea name="deskripsi"
                            class="w-full h-28 p-3 rounded bg-[#e3e4dc] outline-none text-sm resize-none">{{ old('deskripsi', $alat->deskripsi) }}</textarea>
                    </div>
                </div>

                <!-- DETAIL SPESIFIKASI -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 text-green-800 font-bold text-sm mb-3">
                        <span>&#9783;</span>
                        <h2>DETAIL SPESIFIKASI</h2>
                    </div>

                    <div class="border-t border-gray-300 pt-5">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="text-xs font-bold text-gray-700 tracking-wide">
                                    BRAND
                                </label>

                                <input type="text" name="brand"
                                    value="{{ old('brand', $alat->brand) }}"
                                    class="w-full mt-2 p-3 rounded bg-[#e3e4dc] outline-none text-sm">
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-700 tracking-wide">
                                    BERAT
                                </label>

                                <input type="text" name="berat"
                                    value="{{ old('berat', $alat->berat) }}"
                                    class="w-full mt-2 p-3 rounded bg-[#e3e4dc] outline-none text-sm">
                            </div>

                            <div>
                                <label class="text-xs font-bold text-gray-700 tracking-wide">
                                    MATERIAL
                                </label>

                                <input type="text" name="material"
                                    value="{{ old('material', $alat->material) }}"
                                    class="w-full mt-2 p-3 rounded bg-[#e3e4dc] outline-none text-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KELOLA STOK -->
                <div>
                    <div class="flex items-center gap-2 text-green-800 font-bold text-sm mb-3">
                        <span>&harr;</span>
                        <h2>KELOLA STOK</h2>
                    </div>

                    <div class="border-t border-gray-300 pt-5">
                        <div class="bg-[#e3e4dc] rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-bold text-green-800">
                                    Stok Tersedia
                                </h3>
                                <p class="text-xs text-gray-500">
                                    Update jumlah stok di gudang.
                                </p>
                            </div>

                            <div class="flex items-center bg-white rounded-lg overflow-hidden border">
                                <button type="button" onclick="kurangStok()" class="px-3 py-2 text-gray-600">
                                    &minus;
                                </button>

                                <input type="number" id="stok" name="stok" value="{{ old('stok', $alat->stok) }}" min="0"
                                    class="w-12 text-center outline-none text-sm">

                                <button type="button" onclick="tambahStok()" class="px-3 py-2 text-gray-600">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-4 mt-10">
            <a href="{{ route('admin.produk') }}"
                class="px-8 py-3 rounded-lg border border-green-800 text-green-800 font-semibold text-sm hover:bg-green-50">
                Batal
            </a>

            <button type="submit"
                class="px-8 py-3 rounded-lg bg-green-800 text-white font-semibold text-sm hover:bg-green-900">
                Simpan Perubahan
            </button>
        </div>

    </form>

</main>

<!-- FOOTER -->
<footer class="bg-green-900 text-gray-200 px-10 pt-12 pb-6 mt-8">

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
    function previewFile(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewGambar');

        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function clearImage() {
        document.getElementById('previewGambar').src = 'https://via.placeholder.com/400x360?text=No+Image';
        document.getElementById('gambar').value = '';
    }

    function tambahStok() {
        let input = document.getElementById('stok');
        input.value = parseInt(input.value) + 1;
    }

    function kurangStok() {
        let input = document.getElementById('stok');

        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

</body>
</html>