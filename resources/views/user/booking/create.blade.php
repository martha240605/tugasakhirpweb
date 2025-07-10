<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentukan Waktu bermain Anda!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.booking.store') }}">
                        @csrf
                        
                        {{-- Lapangan ID (Hidden) --}}
                        <input type="hidden" name="lapangan_id" value="{{ $lapangan->id }}">

                        {{-- Tampilkan Nama Lapangan --}}
                        <div class="mb-4">
                            <x-input-label :value="__('Lapangan yang dipilih')" />
                            <input type="text" class="block w-full mt-1 rounded-md bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200" 
                                   value="{{ $lapangan->nama }}" readonly>
                        </div>

                        {{-- Pilih Jam --}}
                        <div class="mb-4">
                            <x-input-label for="time_slot_id" :value="__('Pilih Jam Mulai')" />
                            <select id="time_slot_id" name="time_slot_id" class="block w-full mt-1 rounded-md" required>
                                <option value="">Pilih Jam</option>
                                @foreach($timeSlots as $timeSlot)
                                    <option value="{{ $timeSlot->id }}">
                                        {{ \Carbon\Carbon::parse($timeSlot->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($timeSlot->jam_selesai)->format('H:i') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal --}}
                        <div class="mb-4">
                            <x-input-label for="tanggal" :value="__('Tanggal Booking')" />
                            <x-text-input id="tanggal" type="date" name="tanggal"
                                          :value="old('tanggal', now()->format('Y-m-d'))" required />
                        </div>

                        {{-- Durasi --}}
                        <div class="mb-4">
                            <x-input-label for="durasi" :value="__('Durasi (jam)')" />
                            <x-text-input id="durasi" type="number" name="durasi"
                                          min="1" :value="old('durasi', 1)" required />
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>{{ __('Booking') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
