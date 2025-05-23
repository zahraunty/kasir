<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaksi Baru
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5C3A21] mb-4">Form Transaksi</h1>

        @if (session('success'))
            <div class="mb-4 text-green-700 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-700 font-semibold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-[#5C3A21]">Nama Pelanggan (opsional):</label>
                <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                       class="border p-2 w-full rounded @error('customer_name') border-red-500 @enderror">
                @error('customer_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-semibold text-[#5C3A21]">Barang:</label>
                <div id="items-container" class="space-y-2">
                    @foreach ($items as $item)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="items[{{ $item->id }}][id]" value="{{ $item->id }}"
                                   class="mr-2 item-checkbox" data-id="{{ $item->id }}">
                            <span>{{ $item->name }} (Rp{{ number_format($item->price, 0, ',', '.') }})</span>
                            <input type="number" name="items[{{ $item->id }}][quantity]" min="1" placeholder="Qty"
                                   class="border p-1 w-20 rounded item-quantity @error('items.' . $item->id . '.quantity') border-red-500 @enderror"
                                   data-id="{{ $item->id }}" disabled>
                            @error('items.' . $item->id . '.quantity')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <input type="number" name="items[{{ $item->id }}][discount]" min="0" max="100" step="0.01" placeholder="Diskon (%)"
                                   class="border p-1 w-20 rounded item-discount @error('items.' . $item->id . '.discount') border-red-500 @enderror"
                                   data-id="{{ $item->id }}" disabled>
                            @error('items.' . $item->id . '.discount')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Transaksi
            </button>
        </form>

        <br>
        <a href="{{ route('dashboard') }}"
           class="bg-[#d6c2a8] text-[#4e4039] px-4 py-2 rounded hover:bg-[#c2ad92] shadow">
            Kembali ke Dashboard
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const id = this.dataset.id;
                    const quantityInput = document.querySelector(`.item-quantity[data-id="${id}"]`);
                    const discountInput = document.querySelector(`.item-discount[data-id="${id}"]`);
                    quantityInput.disabled = !this.checked;
                    discountInput.disabled = !this.checked;
                    if (!this.checked) {
                        quantityInput.value = '';
                        discountInput.value = '';
                    }
                });
            });
        });
    </script>
</x-app-layout>