<div>
    <div class="mt-3">
        <div class="flex justify-start">
            <x-button icon="plus" onClick="$openModal('addCity')" primary label="اضافة" class="mb-3" />
        </div>
        {{-- ADD MODAL --}}
        <x-modal.card  blur wire:model.defer="addCity" max-width="5xl">
            @livewire('city.add')
        </x-modal.card>
        <x-card>
            {{-- <div>
                @livewire('city.add')
            </div> --}}
            <div>
                <livewire:city.show key={{now()}}/>
            </div>
        </x-card>
    </div>
</div>
