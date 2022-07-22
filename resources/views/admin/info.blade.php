<?php
$operations = [
    ['title' => 'Changing photo', 'startedBy' => 'admin', 'isEnded' => false],
    ['title' => 'Renaming photos', 'startedBy' => 'admin', 'isEnded' => false],
    ['title' => 'Loading info', 'startedBy' => 'admin', 'isEnded' => true],
];
$users = [
    ['name' => 'customer', 'isAdmin' => false],
    ['name' => 'manager', 'isAdmin' => false],
    ['name' => 'admin', 'isAdmin' => true],
];
?>

<div class="w-full bg-white rounded p-6">
    <div class="m-2">
        <span class="font-bold text-lg">Operation history:</span>
        @foreach($operations as $operation)
            <div class="flex justify-items-end w-full bg-blue-100 m-2 p-4 rounded-xl gap-2">
                <div class="w-5 h-5 shrink-0 bg-green-400 rounded-xl justify-self-start self-center"></div>
                <div class="break-all grow">{{ $operation['title'] }}</div>
                <div class="justify-self-end self-center shrink-0">Started by: {{ $operation['startedBy'] }}</div>
            </div>
        @endforeach
    </div>
    <div class="m-2">
        <span class="font-bold text-lg">Users online:</span>
        @foreach($users as $user)
            <span>{{ $user['name'] }}{{ last($users)['name'] === $user['name'] ? '' : ',' }}</span>
        @endforeach
    </div>
</div>
