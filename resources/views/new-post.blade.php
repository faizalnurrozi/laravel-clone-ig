<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white h-screen overflow-hidden flex items-center justify-center shadow-xl sm:rounded-lg">

                <form wire:submit.prevent="save">
                    <input type="file" wire:model="photo">

                    @error('photo') <span class="error">{{ $message }}</span> @enderror

                    <button type="submit">Save Photo</button>
                </form>
                
            </div>
        </div>
    </div>
</x-app-layout>
