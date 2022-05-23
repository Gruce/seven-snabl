<div>
    <div class="mt-3">
        <div class="flex justify-start">
            <x-button icon="plus" onclick="$openModal('addAdmin')" primary label="اضافة" class="mb-3" />
        </div>
        {{-- ADD MODAL --}}
        <x-modal.card  blur wire:model.defer="addAdmin" max-width="5xl">
            @livewire('admin.add')
        </x-modal.card>
        <x-card>
            <div >
                <livewire:admin.show key={{now()}}/>
            </div>
        </x-card>
    </div>
</div>
