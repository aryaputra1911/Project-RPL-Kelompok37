<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<title>PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TANPA FILE CSS, pakai Tailwind CDN -->
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

<div class="px-10 py-6">

    <!-- BACK -->
    <a href="{{ url('/keranjang') }}" class="text-gray-600 text-sm mb-4 block">← Kembali</a>

    <div class="flex gap-8">

        <!-- LEFT -->
        <div class="w-2/3">

            <!-- BIODATA -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-7 h-7 rounded-full bg-green-800 text-white flex items-center justify-center text-sm">1</div>
                    <h2 class="text-lg font-semibold text-gray-800">Biodata Penyewa</h2>
                </div>

                <div class="bg-[#EDEFE7] p-6 rounded-xl">

                    <div class="mb-4">
                        <label class="text-xs font-semibold text-gray-600">NAMA LENGKAP</label>
                        <input id="namaLengkap" type="text" placeholder="Masukkan nama sesuai KTP"
                        class="w-full mt-1 p-3 rounded bg-[#DCDDD5] outline-none">
                    </div>

                    <div class="mb-4">
                        <label class="text-xs font-semibold text-gray-600">EMAIL</label>
                        <input id="email" type="text" placeholder="Masukkan email"
                        class="w-full mt-1 p-3 rounded bg-[#DCDDD5] outline-none">
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-gray-600">NOMOR WHATSAPP</label>
                        <div class="flex mt-1">
                            <span class="bg-[#DCDDD5] px-3 flex items-center rounded-l">+62</span>
                            <input id="whatsapp" type="text" placeholder="xxxxxxxx"
                            class="w-full p-3 bg-[#DCDDD5] rounded-r outline-none">
                        </div>
                    </div>

                </div>
            </div>

            <!-- METODE -->
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-7 h-7 rounded-full bg-green-800 text-white flex items-center justify-center text-sm">2</div>
                    <h2 class="text-lg font-semibold text-gray-800">Metode Pembayaran</h2>
                </div>

                <div class="border-2 border-green-800 rounded-xl p-5 w-[300px]">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold">QRIS</span>
                        <input type="radio" checked>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">
                        OVO, GoPay, ShopeePay, Dana, LinkAja
                    </p>
                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="w-1/3">

            <div class="bg-[#EDEFE7] p-6 rounded-xl shadow">

                <h3 class="font-semibold text-green-800 mb-4">Ringkasan Sewa</h3>

                <!-- ITEM -->
                <div class="flex gap-3 mb-3">
                    <img src="https://areioutdoorgear.co.id/wp-content/uploads/2025/07/areioutdoorgear_20250709_686dd89d2ff39.webp"
                    class="w-14 h-14 rounded object-cover">

                    <div class="text-xs">
                        <p class="font-semibold">Tenda Dome 4P</p>
                        <p class="text-gray-500">Eiger, 3.5 kg, Rip Nylon</p>
                        <p class="text-green-800 font-semibold">Rp 450.000 / unit / 3 hari</p>
                    </div>
                </div>

                <div class="flex gap-3 mb-4">
                    <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-02-at-12.42.02.jpeg"
                    class="w-14 h-14 rounded object-cover">

                    <div class="text-xs">
                        <p class="font-semibold">Carrier 60L Pro-Series</p>
                        <p class="text-gray-500">The North Face, 60L, Waterproof</p>
                        <p class="text-green-800 font-semibold">Rp 255.000 / unit / 3 hari</p>
                    </div>
                </div>

                <!-- TANGGAL -->
                <div class="bg-[#213B56] text-white p-3 rounded-lg text-xs mb-4">
                    <p class="font-semibold">TANGGAL SEWA</p>
                    <p>12 Mar 2026 - 15 Mar 2026 (3 Hari)</p>
                </div>

                <!-- TOTAL -->
                <div class="text-sm mb-2 flex justify-between">
                    <span>Subtotal Sewa</span>
                    <span>Rp 705.000</span>
                </div>

                <div class="text-sm mb-2 flex justify-between">
                    <span>Biaya Layanan</span>
                    <span>Rp 5.000</span>
                </div>

                <div class="text-sm mb-4 flex justify-between">
                    <span>Biaya Deposit</span>
                    <span>Rp 100.000</span>
                </div>

                <hr class="mb-4">

                <div class="mb-4">
                    <p class="text-xs text-gray-500">TOTAL PEMBAYARAN</p>
                    <p class="text-2xl font-bold text-[#213B56]">Rp 810.000</p>
                </div>

                <button onclick="simpanBiodataDanLanjut()"
                    class="w-full bg-green-800 text-white py-3 rounded">
                        Bayar Sekarang
                </button>

            </div>

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
function formatRupiahLocal(num) {
    return "Rp " + num.toLocaleString("id-ID");
}

function parseHarga(str) {
    return parseInt(String(str).replace(/\D/g, '')) || 0;
}

function simpanBiodataDanLanjut() {
    let nama = document.getElementById("namaLengkap").value.trim();
    let email = document.getElementById("email").value.trim();
    let whatsapp = document.getElementById("whatsapp").value.trim();

    if (!nama) {
        alert("Mohon isi nama lengkap.");
        document.getElementById("namaLengkap").focus();
        return;
    }

    // Simpan biodata ke localStorage
    let biodata = {
        nama: nama,
        email: email || "{{ Auth::user()->email ?? '' }}",
        whatsapp: whatsapp ? "+62 " + whatsapp : ""
    };
    localStorage.setItem("biodata_{{ Auth::id() }}", JSON.stringify(biodata));

    // Ambil checkout data dari localStorage
    let checkoutData = JSON.parse(localStorage.getItem("checkoutData_{{ Auth::id() }}"));
    if (!checkoutData || !checkoutData.items || checkoutData.items.length === 0) {
        alert("Keranjang kosong! Silakan tambahkan produk terlebih dahulu.");
        window.location.href = "{{ url('/keranjang') }}";
        return;
    }

    // Kirim checkout ke server
    let btn = document.querySelector('button[onclick="simpanBiodataDanLanjut()"]');
    btn.disabled = true;
    btn.innerText = "Memproses...";

    fetch("{{ url('/checkout') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            items: checkoutData.items.map(item => ({
                id_alat: item.id_alat || 0,
                nama: item.nama || '',
                jumlah: item.jumlah,
                harga: parseHarga(item.harga)
            })),
            tgl_sewa: checkoutData.tgl_sewa,
            tgl_kembali: checkoutData.tgl_kembali,
            durasi: checkoutData.durasi,
            nama_penyewa: nama,
            email_penyewa: email,
            whatsapp: whatsapp
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.pesanan_ids) {
            // Simpan pesanan IDs untuk halaman pembayaran
            localStorage.setItem("pesanan_ids_{{ Auth::id() }}", JSON.stringify(data.pesanan_ids));
            // Hapus keranjang & checkoutData
            localStorage.removeItem("keranjang_{{ Auth::id() }}");
            localStorage.removeItem("checkoutData_{{ Auth::id() }}");
            // Redirect ke pembayaran
            window.location.href = "{{ url('/pembayaran') }}";
        } else {
            alert(data.message || "Checkout gagal!");
            btn.disabled = false;
            btn.innerText = "Bayar Sekarang";
        }
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi kesalahan. Silakan coba lagi.");
        btn.disabled = false;
        btn.innerText = "Bayar Sekarang";
    });
}

// ─── Render ringkasan dari localStorage ─────────────
document.addEventListener("DOMContentLoaded", function() {
    let checkoutData = JSON.parse(localStorage.getItem("checkoutData_{{ Auth::id() }}"));

    if (!checkoutData || !checkoutData.items || checkoutData.items.length === 0) {
        return;
    }

    // Auto-fill biodata
    let user = {!! json_encode(Auth::user()) !!};
    if (user) {
        document.getElementById("namaLengkap").value = user.nama || "";
        document.getElementById("email").value = user.email || "";
        if (user.no_telp) {
            let telp = user.no_telp.replace(/^\+?62\s?/, '');
            document.getElementById("whatsapp").value = telp;
        }
    }

    // Render items ringkasan
    let ringkasanContainer = document.querySelector('.bg-\\[\\#EDEFE7\\] .font-semibold.text-green-800').parentElement;
    let itemsHtml = '<h3 class="font-semibold text-green-800 mb-4">Ringkasan Sewa</h3>';
    let subtotal = 0;
    let dateOptions = { day: 'numeric', month: 'short', year: 'numeric' };

    checkoutData.items.forEach(item => {
        let harga = parseHarga(item.harga);
        let totalItem = harga * item.jumlah * checkoutData.durasi;
        subtotal += totalItem;

        let imgUrl = item.img || 'https://via.placeholder.com/56';
        itemsHtml += `
            <div class="flex gap-3 mb-3">
                <img src="${imgUrl}" class="w-14 h-14 rounded object-cover" onerror="this.src='https://via.placeholder.com/56'">
                <div class="text-xs">
                    <p class="font-semibold">${item.nama}</p>
                    <p class="text-gray-500">${item.brand || '-'}, ${item.berat || '-'}, ${item.material || '-'}</p>
                    <p class="text-green-800 font-semibold">${formatRupiahLocal(harga)} × ${item.jumlah} unit × ${checkoutData.durasi} hari</p>
                </div>
            </div>
        `;
    });

    let d1 = new Date(checkoutData.tgl_sewa).toLocaleDateString('id-ID', dateOptions);
    let d2 = new Date(checkoutData.tgl_kembali).toLocaleDateString('id-ID', dateOptions);

    itemsHtml += `
        <div class="bg-[#213B56] text-white p-3 rounded-lg text-xs mb-4">
            <p class="font-semibold">TANGGAL SEWA</p>
            <p>${d1} - ${d2} (${checkoutData.durasi} Hari)</p>
        </div>

        <div class="text-sm mb-2 flex justify-between">
            <span>Subtotal Sewa</span>
            <span>${formatRupiahLocal(subtotal)}</span>
        </div>
        <div class="text-sm mb-2 flex justify-between">
            <span>Biaya Layanan</span>
            <span>Rp 5.000</span>
        </div>
        <div class="text-sm mb-4 flex justify-between">
            <span>Biaya Deposit</span>
            <span>Rp 100.000</span>
        </div>
        <hr class="mb-4">
        <div class="mb-4">
            <p class="text-xs text-gray-500">TOTAL PEMBAYARAN</p>
            <p class="text-2xl font-bold text-[#213B56]">${formatRupiahLocal(subtotal + 5000 + 100000)}</p>
        </div>
        <button onclick="simpanBiodataDanLanjut()"
            class="w-full bg-green-800 text-white py-3 rounded">
                Bayar Sekarang
        </button>
    `;

    ringkasanContainer.innerHTML = itemsHtml;
});
</script>

</body>
</html>