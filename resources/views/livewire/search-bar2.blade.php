<div class="relative">
    <input
        type="text"
        class="form-input"
        placeholder="Search Contacts..."
        wire:model="query"
{{--        wire:keydown.escape="reset"--}}
{{--        wire:keydown.tab="reset"--}}
        wire:keydown.ArrowUp="decrementHighlight"
        wire:keydown.ArrowDown="incrementHighlight"
        wire:keydown.enter="selectDoctor"
    />

    <div wire:loading class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
        <div class="list-item">Searching...</div>
    </div>

    @if(!empty($query))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>

        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            @if(!empty($doctors))
                @foreach($doctors as $i => $doctor)
                    <a
                        href="{{url('appointment?id='.$doctor->id)}}"
                        class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                    >{{ $doctor['name'] }}</a>
                @endforeach
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif
</div>
view raw5ec3395c86136.html hosted with ❤ by GitHub
