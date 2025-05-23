<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard Kasir</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#f5f3eb] text-[#4e4039] font-sans">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-[#a68b6d] p-4 text-white">
                <h2 class="text-xl font-bold mb-6">Kasir App</h2>
                <ul>
                    <li><a href="/items" class="block py-2 hover:underline">Daftar Barang</a></li>
                    <li><a href="/transaksi" class="block py-2 hover:underline">Transaksi</a></li>
                    <li><a href="{{ route('riwayat.index') }}"
           class="block py-2 hover:underline">
            Lihat Riwayat Transaksi
        </a></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h1 class="text-2xl font-bold mb-4">Selamat Datang di Aplikasi Kasir</h1>
                
                <div class="bg-[#d6c2a8] p-4 rounded-lg shadow-md mb-6">
                    <p class="text-lg font-semibold mb-2">“Pelayanan terbaik dimulai dari sistem yang rapi.”</p>
                    <p class="text-sm text-[#4e4039]">Aplikasi ini membantu Anda mengelola barang, pelanggan, dan transaksi dengan mudah dan cepat. Navigasikan menu di samping untuk memulai.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-[#e3d3bd] p-4 rounded-lg shadow">
                        <h2 class="text-lg font-bold">Daftar Barang</h2>
                        <p class="text-sm">Kelola stok dan harga barang dengan efisien.</p>
                    </div>
                    <div class="bg-[#e3d3bd] p-4 rounded-lg shadow">
                        <h2 class="text-lg font-bold">Transaksi</h2>
                        <p class="text-sm">Catat transaksi pelanggan secara langsung.</p>
                    </div>
                    <div class="bg-[#e3d3bd] p-4 rounded-lg shadow">
                        <h2 class="text-lg font-bold">Data Pelanggan</h2>
                        <p class="text-sm">Simpan informasi pelanggan untuk layanan yang lebih baik.</p>
                    </div>
                    <div class="bg-[#e3d3bd] p-4 rounded-lg shadow">
                        <h2 class="text-lg font-bold">Riwayat Transaksi</h2>
                        <p class="text-sm">Lihat catatan transaksi sebelumnya untuk keperluan laporan.</p>
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-[#d6c2a8] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-[#4e4039]">
                        {{ __("Anda berhasil login!") }}
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
