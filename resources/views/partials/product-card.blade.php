<a href="#" onclick="openModal(this); return false;" class="produk-item group"
    data-id="{{ $id ?? '' }}"
    data-nama="{{ $nama }}"
    data-harga="{{ $harga }}"
    data-img="{{ $img }}"
    data-desc="{{ $desc ?? '' }}"
    data-brand="{{ $brand ?? '-' }}"
    data-berat="{{ $berat ?? '-' }}"
    data-material="{{ $material ?? '-' }}"
    data-stok="{{ $stok ?? 0 }}"
    data-kategori="{{ $kategori ?? '' }}">
    <div class="bg-[#F1F1EF] rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500">
        <div class="h-60 w-full overflow-hidden">
            <img src="{{ $img }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
        </div>
        <div class="p-6">
            <h3 class="font-bold text-gray-800 mb-4 h-12 overflow-hidden">{{ $nama }}</h3>
            <div class="flex justify-between items-end">
                <div>
                    <p class="text-[10px] font-bold text-gray-400">MULAI DARI</p>
                    <p class="text-[#064E3B] font-extrabold text-xl">{{ $harga }}<span class="text-xs text-gray-500"> /hari</span></p>
                </div>
                <div onclick="event.stopPropagation(); tambahDariCard(this)" class="bg-[#064E3B] p-3 rounded-xl text-white cursor-pointer hover:bg-[#022C22] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</a>
