<?php
    $photosDir = '/images';
?>

<div>
    <form action="test" method="post" class="grid w-max bg-white rounded mx-auto p-8">
        <label class="grid grid-cols-2 w-max m-2">
            Images directory:
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="photosDir"
                type="text"
                value="{{ $photosDir }}"
            >
        </label>
        <label class="grid grid-cols-2 w-max m-2">
            Service:
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="service"
                type="text"
                value="assets"
            >
        </label>
        <label class="grid grid-cols-2 w-max m-2">
            Users:
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="users"
                type="text"
                value="Users"
            >
        </label>
        <label class="grid grid-cols-2 w-max m-2">
            Error:
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                name="users"
                type="text"
                value="E4040"
            >
        </label>
        <button
            class="block mx-auto mt-3 w-max bg-white/0% border border-black hover:bg-black hover:text-white text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"
        >
            Save settings
        </button>
    </form>
</div>
