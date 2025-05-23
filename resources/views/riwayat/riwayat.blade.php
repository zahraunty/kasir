<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Transaksi
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5C3A21] mb-4">Riwayat Transaksi</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Pelanggan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Barang</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Harga Satuan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Diskon (%)</th> <!-- Kolom baru -->
                        <th class="border border-gray-300 px-4 py-2 text-left">Subtotal</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactionItems as $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $item->transaction->customer_name ?? 'Tidak ada' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $item->item->name ?? 'Tidak ada' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $item->quantity }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                Rp{{ number_format($item->unit_price, 0, ',', '.') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $item->discount ?? 0 }}% <!-- Tampilkan diskon -->
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $item->transaction->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>