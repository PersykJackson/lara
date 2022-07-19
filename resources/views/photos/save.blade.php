<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="w-max max-w-xs mx-auto mt-6">
        <form
            class="grid grid-cols-1 justify-items-center bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{route('savePhoto')}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Title
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text"
                        name="title"
                        placeholder="Print title"
                    >
                </label>
            </div>
            <div class="mb-6">
                <label x-data="{ file: '' }" @click="(e) => file && e.preventDefault()" class="border-gray-400 p-2 w-max hover:bg-gray-50">
                    <span x-show="!file" class="cursor-pointer">Choose file</span>
                    <span x-show="file" @click="(e) => {
                e.preventDefault();
                file = ''
                }"
                         class="cursor-pointer h-max"
                    >Refresh</span>
                    <input x-ref="file" class="hidden" type="file" name="photo" x-model="file">
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
