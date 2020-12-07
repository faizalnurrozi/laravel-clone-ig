<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden flex items-center justify-center shadow-xl sm:rounded-lg">

                @livewire('upload-image')
                
            </div>
        </div>
    </div>
</x-app-layout>
