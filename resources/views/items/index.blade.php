<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Barang
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5C3A21] mb-4">Daftar Barang</h1>
        <a href="{{ route('items.create') }}" class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-500 transition duration-200">+ Tambah Barang</a>
       
        @if(session('success'))
            <div class="mt-2 text-green-700">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto mt-4">
            <table class="w-full border-collapse border border-[#A67B5B]">
                <thead class="bg-[#D7CCC8]">
                    <tr>
                        <th class="p-3 text-left border border-[#A67B5B] w-1/4">Nama</th>
                        <th class="p-3 text-left border border-[#A67B5B] w-1/6">Stok</th>
                        <th class="p-3 text-left border border-[#A67B5B] w-1/4">Harga</th>
                        <th class="p-3 text-left border border-[#A67B5B] w-1/4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class="border-t border-[#A67B5B] hover:bg-[#EDE4E0] transition duration-150">
                            <td class="p-3 border border-[#A67B5B]">{{ $item->name }}</td>
                            <td class="p-3 border border-[#A67B5B]">{{ $item->stock }}</td>
                            <td class="p-3 border border-[#A67B5B]">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="p-3 border border-[#A67B5B]">
                                <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a> |
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <a href="{{ route('dashboard') }}" 
           class="bg-[#d6c2a8] text-[#4e4039] px-4 py-2 rounded hover:bg-[#c2ad92] shadow">
            Kembali ke Dashboard
        </a>
    </div>
</x-app-layout>