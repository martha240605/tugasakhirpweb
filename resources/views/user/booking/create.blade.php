<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Booking Baru') }}
        </h2>
    </x-slot>

    <div></div> {{-- Penting: Menambahkan ini untuk slot default di x-app-layout agar tidak undefined --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.booking.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="lapangan_id" :value="__('Pilih Lapangan')" />
                            <select id="lapangan_id" name="lapangan_id" class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Lapangan</option>
                                @foreach($lapangans as $lapangan)
                                    <option value="{{ $lapangan->id }}" {{ old('lapangan_id') == $lapangan->id ? 'selected' : '' }}>
                                        {{ $lapangan->nama }} (Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/jam)
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('lapangan_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="time_slot_id" :value="__('Pilih Jam Mulai (Time Slot)')" />
                            <select id="time_slot_id" name="time_slot_id" class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="">Pilih Jam</option>
                                @foreach($timeSlots as $timeSlot)
                                    <option value="{{ $timeSlot->id }}" {{ old('time_slot_id') == $timeSlot->id ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::parse($timeSlot->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($timeSlot->jam_selesai)->format('H:i') }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('time_slot_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="tanggal" :value="__('Tanggal Booking')" />
                            <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" :value="old('tanggal', \Carbon\Carbon::now()->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="durasi" :value="__('Durasi (Jam)')" />
                            <x-text-input id="durasi" class="block mt-1 w-full" type="number" name="durasi" :value="old('durasi', 1)" min="1" required />
                            <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Buat Booking') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>