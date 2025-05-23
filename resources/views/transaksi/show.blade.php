<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Transaksi
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5C3A21] mb-4">Detail Transaksi</h1>

        <div class="mb-4">
            <p><strong>Nama Pelanggan:</strong> {{ $transaction->customer_name ?? 'Tidak ada' }}</p>
            <p><strong>Total Harga:</strong> Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</p>
        </div>

        <div class="overflow-x-auto zoomable-table">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Barang</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Jumlah</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Harga Satuan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Diskon (%)</th> <!-- Kolom baru -->
                        <th class="border border-gray-300 px-4 py-2 text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->items as $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->item->name ?? 'Tidak ada' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($item->unit_price, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->discount ?? 0 }}%</td> <!-- Tampilkan diskon -->
                            <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>

        @if (!request()->is('transaksi/*/pdf'))
            <a href="{{ route('transaksi.pdf', $transaction->id) }}"
               class="bg-[#d6c2a8] text-[#4e4039] px-4 py-2 rounded hover:bg-[#c2ad92] shadow">
                Hasil PDF
            </a>
        @endif
    </div>

    <style>
    body {
        background-color: #F0EAD6;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #5C3A21;
        margin: 0;
        padding: 0;
    }

    h1, h2 {
        color: #5C3A21;
    }

    .container {
        padding: 2rem;
    }

    .info-box p {
        margin-bottom: 0.5rem;
    }

    .zoomable-table {
        max-width: 100%;
        overflow-x: auto;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 1rem;
    }

    .zoomable-table table {
        width: 100%;
        min-width: 600px;
        border-collapse: collapse;
        background-color: #fff;
    }

    .zoomable-table th {
        background-color: #e6d9c0;
        color: #4e4039;
        font-weight: 600;
        text-align: left;
        padding: 12px;
        border-bottom: 2px solid #d6c2a8;
    }

    .zoomable-table td {
        padding: 12px;
        border-bottom: 1px solid #ccc;
        color: #4e4039;
    }

    .zoomable-table tr:hover {
        background-color: #f4efe6;
    }

    a.button-link {
        display: inline-block;
        background-color: #d6c2a8;
        color: #4e4039;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    a.button-link:hover {
        background-color: #c2ad92;
    }
    </style>
</x-app-layout>