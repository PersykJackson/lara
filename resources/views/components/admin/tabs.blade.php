@props(['tabs', 'selectedTab'])

<div class="grid grid-cols-[200px] w-full auto-rows-max items-center">
    <div class="h-max col-start-1 text-center bg-white rounded p-2 self-start m-2">
        @foreach($tabs as $tab)
            <x-admin.tab :name="$tab" :isSelected="$tab === $selectedTab" />
        @endforeach
    </div>
    <div class="col-start-2 m-2 mx-auto w-full">
        @foreach($tabs as $tab)
            @if($tab === $selectedTab)
                {{ view('admin.tabs.' . $tab) }}
            @endif
        @endforeach
    </div>
</div>
