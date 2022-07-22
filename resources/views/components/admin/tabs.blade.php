<?php
$tabs = [
    ['name' => 'Info', 'url' => '/admin/ifo', 'isSelected' => false],
    ['name' => 'Settings', 'url' => '/admin/settings', 'isSelected' => true],
    ['name' => 'Users', 'url' => '/admin/users', 'isSelected' => false],
];
?>

<div class="grid grid-cols-[200px] w-full auto-rows-max items-center">
    <div class="h-max col-start-1 text-center bg-white rounded p-2 self-start m-2">
        @foreach($tabs as $tab)
            <x-admin.tab :name="$tab['name']" :url="$tab['url']" :isSelected="$tab['isSelected']" />
        @endforeach
    </div>
    <div class="col-start-2 m-2 mx-auto w-full">
        @foreach($tabs as $tab)
            @if($tab['isSelected'])
                {{ view('admin.' . strtolower($tab['name'])) }}
            @endif
        @endforeach
    </div>
</div>
