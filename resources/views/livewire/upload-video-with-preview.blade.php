<form
    wire:submit.prevent="save"
    enctype="multipart/form-data"
    class="space-y-8 divide-y divide-gray-200">

    @csrf
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Video
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Details to create a video.
                </p>
            </div>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Name </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input
                            wire:model="name"
                            type="text" name="name"  id="name" autocomplete="name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        About
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <textarea
                            wire:model="description"
                            id="description" name="description" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about video.</p>
                    </div>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">

                    @if ($video)


                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Video Preview
                        </label>

                        <video width="720" height="240" controls>

                            <source src="{{ $video->temporaryUrl() }}" type="video/mp4">
                            <source src="{{ $video->temporaryUrl() }}" type="video/ogg">
                            <source src="{{ $video->temporaryUrl() }}" type="video/mov">
                        </video>

                    @else


                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Cover photo
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="video" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="video" name="video" wire:model="video" type="file" class="sr-only">
                                            <div wire:loading wire:target="video">Uploading...</div>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        MP4, MOV, AVI up to 200MB
                                    </p>
                                </div>
                            </div>
                        </div>
                        @error('video') <span class="error">{{ $message }}</span> @enderror
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Save
            </button>
        </div>
    </div>
</form>
