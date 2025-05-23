<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#5C3A21] leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen text-[#5C3A21]">
        <h1 class="text-2xl font-bold mb-4">Tambah Barang</h1>

        @if($errors->any())
            <div class="mb-4 text-red-700 font-semibold">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Nama Barang</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border border-gray-300 rounded @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Stok</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="w-full p-2 border border-gray-300 rounded @error('stock') border-red-500 @enderror" required>
                @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Harga</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full p-2 border border-gray-300 rounded @error('price') border-red-500 @enderror" required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-4">
                <button type="submit" class="bg-[#d6c2a8] text-[#4e4039] px-4 py-2 rounded hover:bg-[#c2ad92] shadow">
                    Simpan
                </button>
                <a href="{{ route('items.index') }}" class="ml-3 text-[#4e4039] underline hover:text-[#3b2f29]">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>