<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Panduan Sewa - PeakRent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f4f4ef]">

<!-- NAVBAR -->
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

<!-- TITLE -->
<div class="w-full bg-[#eaeae0] border-b border-gray-100 pb-10"> <div class="max-w-7xl mx-auto px-10">
        
        <h1 class="text-4xl font-bold text-gray-800 pt-12 pb-6">Daftar Peralatan</h1>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex items-center gap-6">
            <div class="flex flex-col flex-1">
                <label class="text-[10px] font-bold text-slate-800 tracking-wider mb-2 ml-1">TANGGAL SEWA</label>
                <input type="date" id="inputTanggalSewa" class="bg-gray-50 border border-gray-200 p-3 rounded-lg text-sm outline-none focus:ring-2 focus:ring-slate-800 text-gray-600">
            </div>

            <div class="flex flex-col w-40">
                <label class="text-[10px] font-bold text-slate-800 tracking-wider mb-2 text-center">DURASI (HARI)</label>
                <div class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg px-4 py-2">
                    <button type="button" onclick="ubahDurasi(-1)" class="text-slate-800 font-bold text-xl">−</button>
                    <input id="inputDurasi" type="number" value="1" min="1" class="bg-transparent w-10 text-center font-bold text-slate-800 outline-none">
                    <button type="button" onclick="ubahDurasi(1)" class="text-slate-800 font-bold text-xl">+</button>
                </div>
            </div>

            <div class="flex flex-col flex-1">
                <label class="text-[10px] font-bold text-slate-800 tracking-wider mb-2 ml-1">TANGGAL KEMBALI</label>
                <input type="date" id="inputTanggalKembali" readonly class="bg-gray-100 border border-gray-200 p-3 rounded-lg text-sm text-gray-500 outline-none cursor-not-allowed">
            </div>

            <div class="self-end">
                <button class="bg-[#064E3B] text-white px-8 py-3.5 rounded-xl hover:bg-[#022C22] flex items-center gap-2 font-bold text-sm transition-all shadow-lg">
                    <span>Cek Ketersediaan</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- MAIN -->
<div class="max-w-7xl mx-auto px-10 flex gap-10 items-start mt-10">

    <div class="w-1/4 sticky top-24 self-start space-y-8">
    <div>
        <h3 class="font-bold text-gray-800 mb-4 text-lg">Kategori</h3>
        <div class="space-y-3 text-sm text-gray-600">
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 accent-green-800 rounded" value="tenda" onchange="filterProduk()"> 
                <span class="group-hover:text-green-800 transition">Tenda & Camping</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 accent-green-800 rounded" value="tas" onchange="filterProduk()"> 
                <span class="group-hover:text-green-800 transition">Tas & Carrier</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 accent-green-800 rounded" value="pakaian" onchange="filterProduk()"> 
                <span class="group-hover:text-green-800 transition">Pakaian Gunung</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 accent-green-800 rounded" value="aksesoris" onchange="filterProduk()"> 
                <span class="group-hover:text-green-800 transition">Aksesoris & Gear</span>
            </label>
        </div>
    </div>

    <div class="bg-[#E2E8E4] p-6 rounded-[2rem] border border-gray-200 shadow-sm">
        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </div>
        <h4 class="font-bold text-slate-800 mb-2 text-sm">Peralatan Terjamin</h4>
        <p class="text-[11px] text-gray-600 leading-relaxed">
            Semua peralatan dibersihkan dan dicek kualitasnya secara ketat sebelum disewakan.
        </p>
    </div>
</div>

    <div class="w-3/4">
        
        <div class="mb-10">
            <div class="bg-white p-2 pl-6 rounded-2xl shadow-sm flex items-center gap-4 border border-gray-100">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <input type="text" id="searchInput" placeholder="Cari perlengkapan mendaki..." 
                    class="w-full py-3 outline-none text-sm text-gray-600 bg-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    
        @foreach($alats as $alat)
        <a href="#" onclick="openModal(this); return false;" class="produk-item group" 
            data-id="{{ $alat->id_alat }}"
            data-nama="{{ $alat->nama_alat }}"
            data-harga="Rp {{ number_format($alat->harga_perhari, 0, ',', '.') }}"
            data-img="{{ $alat->gambar ? asset('storage/' . $alat->gambar) : 'https://via.placeholder.com/300' }}">
            
            <div class="bg-[#F1F1EF] rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">
                <div class="h-60 w-full overflow-hidden">
                    <img src="{{ $alat->gambar ? asset('storage/' . $alat->gambar) : 'https://via.placeholder.com/300' }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 mb-4 h-12 overflow-hidden">{{ $alat->nama_alat }}</h3>
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400">MULAI DARI</p>
                            <p class="text-[#064E3B] font-extrabold text-xl">
                                Rp {{ number_format($alat->harga_perhari, 0, ',', '.') }}<span class="text-xs text-gray-500"> /hari</span>
                            </p>
                        </div>
                        <div class="bg-[#064E3B] p-3 rounded-xl text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach

</a>

    <!-- Tenda Tunnel-->
    <a href="#" 
        onclick="openModal(this)"
        class="produk-item"
        data-kategori="tenda"

        data-nama="Tenda Tunnel 5-6P"
        data-harga="Rp 70.000"
        data-img="https://areioutdoorgear.co.id/wp-content/uploads/2023/11/WhatsApp-Image-2024-02-02-at-09.49.27-2.jpeg"
        data-desc="Tenda dome kapasitas 4 orang dari Eiger yang dirancang praktis dan ringan untuk kegiatan camping maupun pendakian. Dilengkapi material waterproof dengan lapisan double layer untuk perlindungan optimal dari hujan dan angin. Ventilasi udara yang baik menjaga kenyamanan di dalam tenda agar tidak lembap. Cocok digunakan untuk solo trip hingga kelompok kecil yang mengutamakan efisiensi dan kenyamanan."
        data-brand="Eiger"
        data-berat="4.2 kg"
        data-material="Polyester dan PU Coating "
        data-stok="5">

    <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
        hover:shadow-xl hover:-translate-y-1 
        transition duration-300">
            <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/11/WhatsApp-Image-2024-02-02-at-09.49.27-2.jpeg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Tenda Tunnel 5-6P</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 70.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                     <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                     </svg>
                </div>
                </div>
            </div>
        </div>
    </a>

<!-- Carrier 40L-->
    <a href="#" 
        onclick="openModal(this)"
          class="produk-item"

        data-nama="Carrier 40L Pro-Series"
        data-harga="Rp 45.000"
        data-img="https://areioutdoorgear.co.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-02-at-12.42.02.jpeg"
        data-desc="Carrier 40L Pro-Series yang dirancang ergonomis dan nyaman digunakan untuk pendakian jarak pendek hingga menengah. Memiliki kapasitas cukup luas dengan kompartemen rapi, dilengkapi material kuat dan tahan air serta sistem sirkulasi punggung yang baik agar tetap nyaman saat digunakan dalam waktu lama."
        data-brand="ARei"
        data-berat="900 Gram"
        data-material="Rip Nylon Water Resistant"
        data-stok="10"
        data-kategori="tas">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-02-at-12.42.02.jpeg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Carrier 40L Pro-Series</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 45.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                  <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                         <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Carrier 60L-->
   <a href="#" 
        onclick="openModal(this)"
          class="produk-item"

        data-nama="Carrier 60L Pro-Series"
        data-harga="Rp 55.000"
        data-img="https://areioutdoorgear.co.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-06-19-at-11.16.56-2.jpeg"
        data-desc="Carrier 60L Pro-Series yang dirancang ergonomis dan nyaman digunakan untuk pendakian jarak pendek hingga menengah. Memiliki kapasitas cukup luas dengan kompartemen rapi, dilengkapi material kuat dan tahan air serta sistem sirkulasi punggung yang baik agar tetap nyaman saat digunakan dalam waktu lama."
        data-brand="ARei"
        data-berat="1.5 Kg"
        data-material="Rip Nylon Water Resistant"
        data-stok="10"
        data-kategori="tas">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://areioutdoorgear.co.id/wp-content/uploads/2025/08/WhatsApp-Image-2025-06-19-at-11.16.56-2.jpeg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Carrier 60L Pro-Series</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 55.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                         <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Jaket -->
        <a href="#" 
            onclick="openModal(this); return false;"
              class="produk-item"

            data-nama="Jaket Outdoor Credifox Shield Series"
            data-harga="Rp 30.000"
            data-img="https://cdn-jpr.jawapos.com/images/27/2025/05/29/N01777-GORPCORE-Jacket-_-Distro-Motif-Parachute-Mountain-Jacket-1611688820.jpeg"
            data-desc="Jaket outdoor Credifox Shield Series, ringan dan nyaman, dilengkapi fitur water repellent untuk melindungi dari angin dan suhu dingin saat aktivitas luar ruang."
            data-brand="Credifox"
            data-berat="800 gram"
            data-material="Polyester Taslan + Water Repellent"
            data-stok="9"
            data-kategori="pakaian">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://cdn-jpr.jawapos.com/images/27/2025/05/29/N01777-GORPCORE-Jacket-_-Distro-Motif-Parachute-Mountain-Jacket-1611688820.jpeg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Jaket Outdoor Credifox Shield Series </h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 30.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                         <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Sepatu -->
    <a href="#" 
            onclick="openModal(this); return false;"
              class="produk-item"

            data-nama="Sepatu Tracking Waterproof"
            data-harga="Rp 40.000"
            data-img="https://ik.imagekit.io/tvlk/blog/2024/12/shutterstock_2083482538.jpg?tr=q-70,c-at_max,w-1000,h-600"
            data-desc="Sepatu tracking waterproof Keen dengan desain kokoh dan perlindungan maksimal untuk aktivitas outdoor di berbagai medan. Menggunakan material tahan air yang menjaga kaki tetap kering, dilengkapi sol grip kuat agar stabil di permukaan licin, serta bantalan empuk yang memberikan kenyamanan saat digunakan dalam perjalanan panjang."
            data-brand="Keen"
            data-berat="1.5 Kg"
            data-material="Upper sintetis + mesh breathable"
            data-stok="5"
            data-kategori="pakaian">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://ik.imagekit.io/tvlk/blog/2024/12/shutterstock_2083482538.jpg?tr=q-70,c-at_max,w-1000,h-600"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Sepatu Tracking Waterproof</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 40.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                  <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                         <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Kompor -->
    <a href="#" 
            onclick="openModal(this); return false;"
              class="produk-item"

            data-nama="Kompor Portable"
            data-harga="Rp 35.000"
            data-img="https://static.retailworldvn.com/Products/Images/12226/325027/kompor-gas-portable-niko-nk-268c-violet-1.jpg"
            data-desc="Kompor Gas Portable Niko NK-268C dirancang untuk memberikan fleksibilitas. Memiliki desain yang ringkas dan ringan sehingga mudah dibawa dan tidak memakan banyak ruang saat disimpan. tersedia fitur knob pengunci yang berfungsi sebagai pengaman untuk menjaga aliran gas tetap tertutup saat kompor tidak digunakan. Selain portabel, kompor ini juga dilengkapi tas penyimpanan yang kokoh agar lebih nyaman saat dibawa bepergian. Tas tersebut membantu kompor tetap tersusun rapi, aman, dan terlindungi dari benturan selama perjalanan maupun saat disimpan."
            data-brand="Niko"
            data-berat="950 Gram"
            data-material="Material plate berenamel + Pemantik Piezoelectric "
            data-stok="5"
            data-kategori="tenda">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://static.retailworldvn.com/Products/Images/12226/325027/kompor-gas-portable-niko-nk-268c-violet-1.jpg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Kompor Portable</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 35.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                   <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Headlamp -->
    <a href="#" 
        onclick="openModal(this); return false;"
          class="produk-item"

        data-nama="Headlamp LED Outdoor"
        data-harga="Rp 10.000"
        data-img="https://img.id.my-best.com/product_images/bb8e9e53b02e76fff46bea9176bcbfd9.jpeg"
        data-desc="Headlamp LED outdoor yang praktis dan ringan digunakan untuk aktivitas malam hari seperti pendakian dan camping. Dilengkapi pencahayaan terang dengan beberapa mode lampu serta tali elastis yang nyaman dipakai di kepala."
        data-brand="Eiger"
        data-berat="150 gram"
        data-material="ABS Plastic + Elastic Strap"
        data-stok="8"
        data-kategori="aksesoris">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://img.id.my-best.com/product_images/bb8e9e53b02e76fff46bea9176bcbfd9.jpeg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Headlamp LED Outdoor</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 10.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                         <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Tracking Pole -->
    <a href="#" 
        onclick="openModal(this); return false;"
          class="produk-item"

        data-nama="Trekking Pole Adjustable"
        data-harga="Rp 20.000"
        data-img="https://down-id.img.susercontent.com/file/78a0b7c52ffa8925220e28e40c137c8b"
        data-desc="Trekking pole adjustable yang membantu menjaga keseimbangan saat berjalan di medan menanjak maupun menurun. Dilengkapi sistem pengunci yang kuat, pegangan ergonomis yang nyaman, serta ringan dibawa untuk aktivitas hiking dan pendakian."
        data-brand="Haoyang"
        data-berat="300 gram"
        data-material="Aluminium Alloy"
        data-stok="7"
        data-kategori="aksesoris">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://down-id.img.susercontent.com/file/78a0b7c52ffa8925220e28e40c137c8b"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Tracking Pole</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 20.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

<!-- Topi -->
    <a href="#" 
    onclick="openModal(this); return false;"
      class="produk-item"

    data-nama="Bucket Hat Outdoor"
    data-harga="Rp 10.000"
    data-img="https://img.lazcdn.com/g/p/24101af3be6c1a8bcb494c51d429993c.jpg_720x720q80.jpg"
    data-desc="Bucket hat outdoor yang ringan dan nyaman digunakan untuk melindungi dari sinar matahari saat aktivitas di luar ruangan. Dilengkapi bahan breathable serta desain simpel yang cocok untuk hiking maupun penggunaan sehari-hari."
    data-brand="The North Face"
    data-berat="100 gram"
    data-material="Cotton Twill"
    data-stok="20"
    data-kategori="pakaian">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://img.lazcdn.com/g/p/24101af3be6c1a8bcb494c51d429993c.jpg_720x720q80.jpg"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Bucket Hat Outdoor</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 10.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Kompas -->
    <a href="#" 
    onclick="openModal(this); return false;"
     class="produk-item"

    data-nama="Kompas Outdoor"
    data-harga="Rp 10.000"
    data-img="https://image.made-in-china.com/365f3j00fzyiDWRPvgpe/Penggaris-Skala-Peta-Bacaan-Outdoor-Pengukuran-Kompas-dengan-Tali-untuk-Berkemah-Mendaki.webp"
    data-desc="Kompas outdoor yang praktis dan akurat untuk membantu navigasi saat pendakian maupun kegiatan alam terbuka. Dilengkapi penunjuk arah presisi, ringan dibawa, serta mudah digunakan oleh pemula maupun pendaki berpengalaman."
    data-brand="Brunton"
    data-berat="150 gram"
    data-material="Akrilik + Magnet Presisi"
    data-stok="30"
    data-kategori="aksesoris">

        <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 
            transition duration-300">
            <img src="https://image.made-in-china.com/365f3j00fzyiDWRPvgpe/Penggaris-Skala-Peta-Bacaan-Outdoor-Pengukuran-Kompas-dengan-Tali-untuk-Berkemah-Mendaki.webp"
                 class="w-full h-56 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Kompas</h3>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-gray-500">MULAI DARI</p>
                        <p class="text-green-800 font-bold text-lg">
                            Rp 10.000 <span class="text-sm text-gray-600">/hari</span>
                        </p>
                    </div>

                    <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-6 h-6 text-white" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Celana Pria -->
        <a href="#" 
        onclick="openModal(this); return false;"
        class="produk-item"

        data-nama="Celana Cargo Pria"
        data-harga="Rp 25.000"
        data-img="https://www.eigeradventure.com/blog/wp-content/uploads/2025/10/Outland-X28-Pro.jpeg"
        data-desc="Kompas outdoor yang praktis dan akurat untuk membantu navigasi saat pendakian maupun kegiatan alam terbuka. Dilengkapi penunjuk arah presisi, ringan dibawa, serta mudah digunakan oleh pemula maupun pendaki berpengalaman."
        data-brand="Brunton"
        data-berat="150 gram"
        data-material="Akrilik + Magnet Presisi"
        data-stok="30"
        data-kategori="pakaian">

            <div class="group bg-[#efefe9] rounded-xl shadow overflow-hidden 
                hover:shadow-xl hover:-translate-y-1 
                transition duration-300">
                <img src="https://www.eigeradventure.com/blog/wp-content/uploads/2025/10/Outland-X28-Pro.jpeg"
                    class="w-full h-56 object-cover">

                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-2">Celana Cargo Pria</h3>

                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-xs text-gray-500">MULAI DARI</p>
                            <p class="text-green-800 font-bold text-lg">
                                Rp 25.000 <span class="text-sm text-gray-600">/hari</span>
                            </p>
                        </div>

                       <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-green-800 p-3 rounded-lg hover:bg-green-900 transition cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-6 h-6 text-white" 
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

     <!-- PAGINATION -->
        <div class="col-span-3 flex justify-center items-center gap-2 mt-10 mb-16">

            <button class="w-10 h-10 rounded-lg border bg-white hover:bg-gray-100">
                &lt;
            </button>

            <a href="/produk?page=1" 
            class="w-10 h-10 flex items-center justify-center rounded-lg bg-green-800 text-white font-semibold">
                1
            </a>

            <a href="/produk?page=2" 
            class="w-10 h-10 flex items-center justify-center rounded-lg border bg-white hover:bg-gray-100">
                2
            </a>

            <a href="/produk?page=3" 
            class="w-10 h-10 flex items-center justify-center rounded-lg border bg-white hover:bg-gray-100">
                3
            </a>

            <button class="w-10 h-10 rounded-lg border bg-white hover:bg-gray-100">
                &gt;
            </button>
        </div>
    </div>
</div>

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
<!-- MODAL POP UP -->

<div id="modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white w-[1000px] rounded-xl overflow-hidden relative flex">

        <button onclick="closeModal()" class="absolute top-4 right-4 text-xl">✕</button>

        <div class="w-1/2">
            <img id="modalImg" class="w-full h-full object-cover">
        </div>

        <div class="w-1/2 p-8">

           <p id="modalKategori" class="text-xs inline-block px-3 py-1 rounded-full mb-3 text-white" style="background-color: #213B56;"></p>

            <h2 id="modalNama" class="text-3xl font-bold mb-3"></h2>

            <p id="modalDesc" class="text-gray-600 text-sm text-justify leading-relaxed"></p>

            <div class="grid grid-cols-3 gap-3 mb-5">
                <div class="bg-gray-100 p-3 rounded">
                    <p class="text-xs text-gray-500">BRAND</p>
                    <p id="modalBrand"></p>
                </div>

                <div class="bg-gray-100 p-3 rounded">
                    <p class="text-xs text-gray-500">BERAT</p>
                    <p id="modalBerat"></p>
                </div>

                <div class="bg-gray-100 p-3 rounded">
                    <p class="text-xs text-gray-500">MATERIAL</p>
                    <p id="modalMaterial"></p>
                </div>
            </div>

            <p class="text-2xl font-bold text-green-800">
                <span id="modalHarga"></span> /hari
            </p>

            <p class="text-sm text-gray-500 mt-2">
                Stok: <span id="modalStok"></span>
            </p>

            <button onclick="tambahKeranjang()" class="bg-green-800 text-white py-3 rounded-lg mt-6 w-full flex items-center justify-center gap-2 hover:bg-green-900 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-5 h-5 text-white" 
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.25 2.25h1.386c.51 0 .96.343 1.087.838l.383 1.533m0 0L6.75 12h9.879c.75 0 1.4-.515 1.571-1.244l1.179-5.3a.75.75 0 00-.732-.956H5.106m0 0L4.5 3.75M6 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                </svg>
                <span>Tambah ke Keranjang</span>
            </button>

        </div>
    </div>
</div>

<script>
function tambahKeranjang() {
    // Ambil ID dari dataset modal yang sudah diset saat openModal
    let idAlat = document.getElementById("modal").dataset.currentId;

    let produk = {
        id: idAlat,
        nama: document.getElementById("modalNama").innerText,
        harga: document.getElementById("modalHarga").innerText,
        img: document.getElementById("modalImg").src,
        jumlah: 1
    };

    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];
    
    // Cari apakah produk dengan ID yang sama sudah ada di keranjang
    let index = keranjang.findIndex(item => item.id === idAlat);

    if (index !== -1) {
        keranjang[index].jumlah += 1;
    } else {
        keranjang.push(produk);
    }

    localStorage.setItem("keranjang", JSON.stringify(keranjang));
    updateCartCount();
    alert("Produk berhasil masuk keranjang!");
}

// --- 1. LOGIKA AUTO-FILL TANGGAL KEMBALI ---
const inputSewa = document.getElementById('inputTanggalSewa');
const inputDurasi = document.getElementById('inputDurasi');
const inputKembali = document.getElementById('inputTanggalKembali');

function hitungTanggalKembali() {
    if (!inputSewa.value) return;

    let tanggalSewa = new Date(inputSewa.value);
    let durasi = parseInt(inputDurasi.value);

    if (!isNaN(tanggalSewa.getTime()) && durasi > 0) {
        // Tambahkan hari sesuai durasi
        tanggalSewa.setDate(tanggalSewa.getDate() + durasi);
        
        // Format ke YYYY-MM-DD agar bisa dibaca input date
        let yyyy = tanggalSewa.getFullYear();
        let mm = String(tanggalSewa.getMonth() + 1).padStart(2, '0');
        let dd = String(tanggalSewa.getDate()).padStart(2, '0');
        
        inputKembali.value = `${yyyy}-${mm}-${dd}`;
    }
}

// Fungsi tombol + dan - untuk durasi
function ubahDurasi(nilai) {
    let current = parseInt(inputDurasi.value);
    let baru = current + nilai;
    if (baru >= 1) {
        inputDurasi.value = baru;
        hitungTanggalKembali();
    }
}

// Event listener saat input berubah
inputSewa.addEventListener('change', hitungTanggalKembali);
inputDurasi.addEventListener('input', hitungTanggalKembali);


// --- 2. LOGIKA SEARCH BAR (BERFUNGSI) ---
const searchInput = document.getElementById('searchInput');
const produkItems = document.querySelectorAll('.produk-item');

searchInput.addEventListener('input', function() {
    const keyword = this.value.toLowerCase();

    produkItems.forEach(item => {
        const namaProduk = item.dataset.nama.toLowerCase();
        
        if (namaProduk.includes(keyword)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

function openModal(el) {
    document.getElementById("modal").classList.remove("hidden");
    document.getElementById("modal").classList.add("flex");

    document.getElementById("modalNama").innerText = el.dataset.nama;
    document.getElementById("modalHarga").innerText = el.dataset.harga;
    document.getElementById("modalDesc").innerText = el.dataset.desc;
    document.getElementById("modalImg").src = el.dataset.img;

    document.getElementById("modalBrand").innerText = el.dataset.brand;
    document.getElementById("modalBerat").innerText = el.dataset.berat;
    document.getElementById("modalMaterial").innerText = el.dataset.material;
    document.getElementById("modalStok").innerText = el.dataset.stok;
    document.getElementById("modalKategori").innerText = el.dataset.kategori;
    document.getElementById("modalDesc").innerText = el.dataset.desc;
}

function closeModal() {
    document.getElementById("modal").classList.add("hidden");
    document.getElementById("modal").classList.remove("flex");
}

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


function tambahDurasi() {
    let input = document.getElementById("durasi");
    input.value = parseInt(input.value) + 1;
}

function kurangDurasi() {
    let input = document.getElementById("durasi");
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

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

// jalankan saat page load
updateCartCount();

function tambahKeranjang() {
    let produk = {
        nama: document.getElementById("modalNama").innerText,
        harga: document.getElementById("modalHarga").innerText,
        img: document.getElementById("modalImg").src,
        jumlah: 1
    };

    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    let index = keranjang.findIndex(item => item.nama === produk.nama);

    if (index !== -1) {
        keranjang[index].jumlah += 1;
    } else {
        keranjang.push(produk);
    }

    localStorage.setItem("keranjang", JSON.stringify(keranjang));

    updateCartCount(); // 🔥 INI PENTING

    alert("Produk ditambahkan ke keranjang!");
}

function tambahDariCard(el) {
    let parent = el.closest('.produk-item');

    let produk = {
        nama: parent.dataset.nama,
        harga: parent.dataset.harga,
        img: parent.dataset.img,
        jumlah: 1
    };

    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    let index = keranjang.findIndex(item => item.nama === produk.nama);

    if (index !== -1) {
        keranjang[index].jumlah += 1;
    } else {
        keranjang.push(produk);
    }

    localStorage.setItem("keranjang", JSON.stringify(keranjang));

    updateCartCount();

    alert("Ditambahkan ke keranjang!");
}

function updateCartCount() {
    let keranjang = JSON.parse(localStorage.getItem("keranjang")) || [];

    let total = 0;
    keranjang.forEach(item => {
        total += item.jumlah;
    });

    document.getElementById("cartCount").innerText = total;
}

updateCartCount();

</script>

</body>
</html>