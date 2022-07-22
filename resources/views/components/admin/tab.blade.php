@props(['name', 'url', 'isSelected'])

<a
    class="block mx-auto mt-3 w-full bg-gray-500/0% border border-black hover:bg-black hover:text-white text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline p-4 {{ $isSelected ? 'ring ring-black' : '' }}"
    href="{{ $url }}"
>
    {{ $name }}
</a>
