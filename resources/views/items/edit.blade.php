<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="p-6 bg-[#F0EAD6] min-h-screen">
        <h1 class="text-2xl font-bold text-[#5C3A21] mb-4">Edit Barang</h1>

        @if($errors->any())
            <div class="text-red-600 mb-2">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block">Nama Barang</label>
                <input type="text" name="name" class="w-full p-2 border rounded" value="{{ $item->name }}" required>
            </div>
            <div>
                <label class="block">Stok</label>
                <input type="number" name="stock" class="w-full p-2 border rounded" value="{{ $item->stock }}" required>
            </div>
            <div>
                <label class="block">Harga</label>
                <input type="number" name="price" step="0.01" class="w-full p-2 border rounded" value="{{ $item->price }}" required>
            </div>
            <div>
                <button type="submit" class="bg-brown-600 text-black px-4 py-2 rounded">Update</button>
                <a href="{{ route('items.index') }}" class="ml-2 text-black-700">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
