<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#4e4039] leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    <div class="p-6 bg-[#f5f3eb] min-h-screen text-[#4e4039]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Tambah Barang</h1>
        </div>

        @if($errors->any())
            <div class="text-red-600 mb-4 bg-red-100 p-4 rounded">
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
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border border-[#c9b29b] rounded bg-white @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Stok</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="w-full p-2 border border-[#c9b29b] rounded bg-white @error('stock') border-red-500 @enderror" required>
                @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1 font-medium">Harga</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}" class="w-full p-2 border border-[#c9b29b] rounded bg-white @error('price') border-red-500 @enderror" required>
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-4">
                <button type="submit" class="bg-[#c9b29b] text-black px-4 py-2 rounded hover:bg-[#d6c2a8]">
                    Simpan
                </button>
                <a href="{{ route('items.index') }}" class="ml-3 text-[#4e4039] underline hover:text-[#3b2f29]">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>