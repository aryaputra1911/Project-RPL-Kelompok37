<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Keranjang Sewa - PeakRent</title>
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
<div class="px-10 py-8">
    <h1 class="text-5xl font-bold" style="color: #1e3a5f;">Keranjang Sewa</h1>
</div>

<!-- FILTER TANGGAL & DURASI -->
<div class="px-10 mb-6">
    <div class="bg-white p-4 rounded-xl shadow flex gap-4 items-end">

        <!-- Tanggal Ambil -->
        <div class="flex flex-col w-1/3">
            <label class="text-sm text-gray-600 mb-1 font-medium">TANGGAL AMBIL</label>
            <input type="date" id="tglSewa" class="border p-2 rounded bg-[#E2E3DC]"
                onchange="hitungTanggalKembali()">
        </div>

        <!-- Durasi -->
        <div class="flex flex-col w-1/3">
            <label class="text-sm text-gray-600 mb-1 font-medium">DURASI (HARI)</label>
            <div class="flex items-center justify-between border rounded px-4 py-2 bg-[#E2E3DC]">
                <button type="button" onclick="kurangDurasi()" class="font-bold text-lg text-gray-700 hover:text-green-800">−</button>
                <input
                    id="durasi"
                    type="number"
                    value="1"
                    min="1"
                    class="w-12 text-center outline-none bg-[#E2E3DC] font-semibold"
                    onchange="hitungTanggalKembali(); loadCart()">
                <button type="button" onclick="tambahDurasi()" class="font-bold text-lg text-gray-700 hover:text-green-800">+</button>
            </div>
        </div>

        <!-- Tanggal Kembali -->
        <div class="flex flex-col w-1/3">
            <label class="text-sm text-gray-600 mb-1 font-medium">TANGGAL KEMBALI</label>
            <input type="date" id="tglKembali" readonly
                class="border p-2 rounded bg-gray-100 text-gray-500 cursor-not-allowed">
        </div>

    </div>
</div>

<!-- MAIN CONTENT -->
<div class="px-10 flex gap-6 mb-16">

    <!-- LIST KERANJANG -->
    <div class="w-2/3 space-y-4" id="cartItems">
        <!-- Diisi oleh JavaScript -->
    </div>

    <!-- RINGKASAN SEWA -->
    <div class="w-1/3">
        <div class="bg-[#EDEFE7] p-6 rounded-xl shadow sticky top-24">

            <h3 class="font-semibold mb-4 text-lg text-gray-800">Ringkasan Sewa</h3>

            <div id="ringkasanItems" class="space-y-2 mb-4 text-sm text-gray-600">
                <!-- Diisi oleh JavaScript -->
            </div>

            <hr class="my-4">

            <div class="flex justify-between text-sm mb-2">
                <span>Subtotal</span>
                <span id="subtotal" class="font-medium">Rp 0</span>
            </div>

            <div class="flex justify-between text-sm mb-2">
                <span>Biaya Layanan</span>
                <span>Rp 5.000</span>
            </div>

            <div class="flex justify-between text-sm mb-4">
                <span>Deposit</span>
                <span>Rp 100.000</span>
            </div>

            <hr class="mb-4">

            <div class="flex justify-between font-bold text-lg">
                <span>Total</span>
                <span id="total" class="text-green-800">Rp 0</span>
            </div>

            <div class="text-xs text-gray-500 mt-1 mb-4">
                Durasi: <span id="durasiLabel">1</span> hari
            </div>

            @auth
            <button onclick="lanjutPembayaran()"
                class="w-full bg-green-800 text-white py-3 mt-2 rounded-xl hover:bg-green-900 transition font-semibold">
                Lanjut ke Pembayaran →
            </button>
            @else
            <a href="{{ url('/login') }}"
                class="block w-full bg-green-800 text-white py-3 mt-2 rounded-xl hover:bg-green-900 transition font-semibold text-center">
                Login untuk Melanjutkan
            </a>
            @endauth

        </div>
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

// ─── FORMAT RUPIAH ─────────────────────────────────────────────
function formatRupiah(num) {
    return "Rp " + num.toLocaleString("id-ID");
}

// ─── PARSING HARGA dari string "Rp 70.000" → integer 70000 ────
function parseHarga(str) {
    return parseInt(String(str).replace(/\D/g, '')) || 0;
}

// ─── DURASI dari input ─────────────────────────────────────────
function getDurasi() {
    return Math.max(1, parseInt(document.getElementById("durasi").value) || 1);
}

// ─── HITUNG TANGGAL KEMBALI otomatis ──────────────────────────
function hitungTanggalKembali() {
    let tglSewa = document.getElementById("tglSewa").value;
    let durasi = getDurasi();

    if (tglSewa) {
        let tgl = new Date(tglSewa);
        tgl.setDate(tgl.getDate() + durasi);
        document.getElementById("tglKembali").value = tgl.toISOString().split('T')[0];
    }

    document.getElementById("durasiLabel").innerText = durasi;
    loadCart();
}

// ─── LOAD KERANJANG ───────────────────────────────────────────
function loadCart() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];
    let container = document.getElementById("cartItems");
    let ringkasan = document.getElementById("ringkasanItems");
    let durasi = getDurasi();

    // Update label durasi di ringkasan
    document.getElementById("durasiLabel").innerText = durasi;

    // Kosong
    if (keranjang.length === 0) {
        container.innerHTML = `
            <div class="bg-white p-10 rounded-xl shadow text-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-gray-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h14m-6 0a2 2 0 11-4 0m4 0a2 2 0 104 0"/>
                </svg>
                <p class="text-lg font-semibold text-gray-500">Keranjang kosong</p>
                <p class="text-sm mt-1">Tambahkan peralatan dari halaman produk terlebih dahulu.</p>
                <a href="{{ url('/produk') }}" class="inline-block mt-6 bg-green-800 text-white px-6 py-2.5 rounded-xl hover:bg-green-900 transition text-sm font-medium">
                    Lihat Produk
                </a>
            </div>
        `;
        ringkasan.innerHTML = '<p class="text-sm text-gray-400 italic">Belum ada item</p>';
        document.getElementById("subtotal").innerText = formatRupiah(0);
        document.getElementById("total").innerText = formatRupiah(0);
        document.getElementById("cartCount").innerText = 0;
        return;
    }

    let html = "";
    let ringkasanHtml = "";
    let subtotal = 0;

    keranjang.forEach((item, i) => {
        let hargaPerHari = parseHarga(item.harga);
        let totalItem = hargaPerHari * item.jumlah * durasi;
        subtotal += totalItem;

        html += `
        <div class="bg-white p-5 rounded-xl shadow flex items-start gap-6">

            <!-- GAMBAR -->
            <img src="${item.img}"
                class="w-40 h-40 min-w-[160px] object-cover rounded-xl"
                onerror="this.src='https://via.placeholder.com/160?text=Gambar'">

            <!-- INFO -->
            <div class="flex-1">
                <h3 class="font-semibold text-lg text-gray-800">${item.nama}</h3>

                <p class="text-sm text-gray-500 mt-1">
                    ${item.brand || '-'} &nbsp;·&nbsp; ${item.berat || '-'} &nbsp;·&nbsp; ${item.material || '-'}
                </p>

                <p class="text-green-800 font-semibold mt-2">
                    ${formatRupiah(hargaPerHari)} / unit / hari
                </p>

                <!-- QTY -->
                <div class="flex items-center gap-3 mt-4">
                    <button onclick="ubahJumlah(${i}, -1)"
                        class="w-8 h-8 border rounded hover:bg-gray-100 transition font-bold text-gray-600">−</button>
                    <span class="font-semibold text-gray-700">${item.jumlah}</span>
                    <button onclick="ubahJumlah(${i}, 1)"
                        class="w-8 h-8 border rounded hover:bg-gray-100 transition font-bold text-gray-600">+</button>
                    <span class="text-xs text-gray-400 ml-2">unit</span>
                </div>
            </div>

            <!-- TOTAL + HAPUS -->
            <div class="self-stretch flex flex-col items-end justify-between min-w-[140px]">

                <!-- ICON SAMPAH -->
                <button onclick="hapusItem(${i})"
                class="text-red-400 hover:text-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                    a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6
                    M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"/>
                    </svg>
                </button>

                <!-- TOTAL ITEM -->
                <div class="text-right">
                    <p class="text-xs text-gray-500">TOTAL ITEM</p>
                    <p class="font-bold text-lg mt-1 text-gray-800">${formatRupiah(totalItem)}</p>
                    <p class="text-xs text-gray-400">${item.jumlah} unit × ${durasi} hari</p>
                </div>
            </div>
        </div>
        `;

        ringkasanHtml += `
            <div class="flex justify-between">
                <span class="truncate max-w-[60%]">${item.nama} ×${item.jumlah}</span>
                <span class="font-medium">${formatRupiah(totalItem)}</span>
            </div>
        `;
    });

    container.innerHTML = html;
    ringkasan.innerHTML = ringkasanHtml;

    let total = subtotal + 5000 + 100000;

    document.getElementById("subtotal").innerText = formatRupiah(subtotal);
    document.getElementById("total").innerText = formatRupiah(total);
}

// ─── HAPUS ITEM ───────────────────────────────────────────────
function hapusItem(index) {
    if (!confirm("Yakin mau hapus produk ini dari keranjang?")) return;

    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];
    keranjang.splice(index, 1);
    localStorage.setItem("keranjang_{{ Auth::id() }}", JSON.stringify(keranjang));

    updateCartCount();
    loadCart();
}

// ─── UBAH JUMLAH ──────────────────────────────────────────────
function ubahJumlah(index, change) {
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];
    keranjang[index].jumlah += change;

    if (keranjang[index].jumlah <= 0) {
        keranjang.splice(index, 1);
    }

    localStorage.setItem("keranjang_{{ Auth::id() }}", JSON.stringify(keranjang));
    updateCartCount();
    loadCart();
}

// ─── TAMBAH / KURANG DURASI ───────────────────────────────────
function tambahDurasi() {
    let d = document.getElementById("durasi");
    d.value = parseInt(d.value) + 1;
    hitungTanggalKembali();
}

function kurangDurasi() {
    let d = document.getElementById("durasi");
    if (parseInt(d.value) > 1) {
        d.value = parseInt(d.value) - 1;
        hitungTanggalKembali();
    }
}

// ─── UPDATE BADGE CART ────────────────────────────────────────
function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];
    let total = keranjang.reduce((a, b) => a + b.jumlah, 0);
    document.getElementById("cartCount").innerText = total;
}

// ─── LANJUT PEMBAYARAN ────────────────────────────────────────
function lanjutPembayaran() {
    let tglSewa = document.getElementById("tglSewa").value;
    let durasi = getDurasi();
    let keranjang = JSON.parse(localStorage.getItem("keranjang_{{ Auth::id() }}")) || [];

    if (keranjang.length === 0) {
        alert("Keranjang Anda masih kosong. Tambahkan produk terlebih dahulu.");
        return;
    }

    if (!tglSewa) {
        alert("Pilih tanggal ambil terlebih dahulu.");
        document.getElementById("tglSewa").focus();
        return;
    }

    // Simpan data checkout ke localStorage untuk digunakan di halaman checkout
    let tglKembali = document.getElementById("tglKembali").value;
    let checkoutData = {
        tgl_sewa: tglSewa,
        tgl_kembali: tglKembali,
        durasi: durasi,
        items: keranjang
    };
    localStorage.setItem("checkoutData_{{ Auth::id() }}", JSON.stringify(checkoutData));

    // Arahkan ke halaman formulir
    window.location.href = "{{ url('/formulir') }}";
}

// ─── INIT ─────────────────────────────────────────────────────
// Set tanggal sewa default = hari ini
(function() {
    let today = new Date().toISOString().split('T')[0];
    document.getElementById("tglSewa").value = today;
    hitungTanggalKembali();
    updateCartCount();
    loadCart();
})();

</script>

</body>
</html>