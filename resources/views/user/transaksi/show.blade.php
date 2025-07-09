<x-app-layout>
<div class="max-w-4xl mx-auto py-10">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('storage/gambar/' . $lapangan->gambar) }}" alt="{{ $lapangan->nama }}"
            class="w-full h-72 object-cover">
        
        <div class="p-6 space-y-4">
            <h2 class="text-2xl font-bold text-gray-800">{{ $lapangan->nama }}</h2>
            <p class="text-sm text-gray-600"><strong>Jenis:</strong> {{ $lapangan->jenis }}</p>
            <p class="text-sm text-gray-600"><strong>Harga per Jam:</strong> Rp{{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-700"><strong>Deskripsi:</strong><br>{{ $lapangan->deskripsi }}</p>
            <p class="text-sm text-gray-600"><strong>Status:</strong> 
                @if($lapangan->status === 'Tersedia')
                    <span class="text-green-600 font-semibold">Tersedia</span>
                @else
                    <span class="text-red-600 font-semibold">Disewa</span>
                @endif
            </p>

            <div class="mt-6">
                <a href="{{ route('user.booking.create', ['lapangan_id' => $lapangan->id]) }}"
                    class="inline-block px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
                    Booking Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
