<?php
$users = ['admin', 'manager', 'customer', 'test', 'andrii', 'alex', 'vlad', 'jack', 'tracy'];
$actions = ['give admin', 'delete', 'ban', 'unban', 'logout'];
?>

<div class="bg-white p-2" x-data="{ user: null, action: null, isModalShowed: false }">
    <div @click="isModalShowed = false" x-show="isModalShowed" class="bg-black/25 fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div @click="(event) => event.stopPropagation()" class="relative p-4 mx-auto mt-[20%] w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button
                    @click="isModalShowed = false"
                    type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400" x-text="'Are you sure you want to ' + action + ' ' + user + '?'"></h3>
                    <button
                        @click="$refs.form.submit()"
                        type="button"
                        class="text-white bg-gray-500 hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-200 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                    >
                        Yes
                    </button>
                    <button
                        @click="isModalShowed = false"
                        type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    >
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>
    <form x-ref="form" class="hidden">
        <input type="text" name="user" x-model="user" />
        <input type="text" name="action" x-model="action" />
    </form>
    @foreach($users as $user)
        <div class="flex justify-between bg-blue-100 m-2 rounded">
            <span class="p-2 font-bold self-center ml-5">{{ $user }}</span>
            <div>
                @foreach($actions as $action)
                    <button
                        @click="() => {
                            user = '{{ $user }}';
                            action = '{{ $action }}';
                            isModalShowed = true;
                        }"
                        class="p-2 m-2 bg-orange-500/0% border border-black hover:bg-black hover:text-white text-black rounded font-bold"
                    >{{ $action }}</button>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
