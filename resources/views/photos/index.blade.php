<x-app-layout class="h-full">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap items-center mx-auto content-center justify-around mt-0 h-full">
        @foreach($photos as $url)
            <x-photo-card :url="$url" />
        @endforeach
    </div>
</x-app-layout>
