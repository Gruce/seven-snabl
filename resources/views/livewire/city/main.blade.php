<div>
    <div class="mt-3" >
        <x-card>

            <div x-show="open" @click.outside="open = false" class="mb-3">
                @livewire('city.add')
            </div>
            @livewire('city.show')
        </x-card>
    </div>
</div>
