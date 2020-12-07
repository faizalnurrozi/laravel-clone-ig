<form wire:submit.prevent="save" enctype="multipart/form-data">

    @if ($photos)
    <div class="flex flex-wrap justify-self-auto">

        @foreach ($photos as $photo)
            <div class="m-1 border-solid border border-gray-200 shadow-lg h-32 w-32 font-medium bg-white rounded-md flex items-center justify-center">
                <img src="{{ $photo->temporaryUrl() }}">
            </div>
        @endforeach

    </div>
    @endif

    @error('photos.*')
    <div class="text-white px-6 py-4 border-0 rounded relative mt-4 mb-4 bg-red-500">
        <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell" />
        </span>
        <span class="inline-block align-middle mr-8">
            <b class="capitalize">Message:</b> {{ $message }}
        </span>
    </div>
    @enderror

    <div class="grid grid-rows-3 grid-flow-col gap-4">

        <div>
            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="input-new-post" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input wire:model="photos" multiple id="input-new-post" name="input-new-post" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save & add caption
            </button>
        </div>

    </div>

</form>