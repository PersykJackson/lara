<x-tabs-layout :tabs="$tabs" :selectedTab="$selectedTab">
    <div>
        <form action="{{ route('updateSettings') }}" method="post" class="grid w-max bg-white rounded mx-auto p-8">
            @csrf
            @method('PUT')
            @foreach($settings as $setting)
                <label class="grid grid-cols-2 w-max m-2">
                    {{ $setting->title }}:
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="{{ $setting->short_title }}"
                        type="text"
                        value="{{ $setting->value }}"
                    >
                </label>
            @endforeach
            <button
                class="block mx-auto mt-3 w-max bg-white/0% border border-black hover:bg-black hover:text-white text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Save settings
            </button>
        </form>
    </div>
</x-tabs-layout>
