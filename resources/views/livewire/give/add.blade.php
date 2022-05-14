<x-modal.card title="Edit Customer" blur wire:model.defer="cardModal-{{ $form->id }}">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-select
        @foreach($gives as $give)
              <option value="{{ $item->id }}">{{ $item->text }}</option>
              @endforeach
        ]" wire:model.lazy="input.person.level" option-label="name" option-value="id" />
        <x-input label="Phone" placeholder="USA phone" />
        {{ $form->id }}
    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Delete" wire:click="delete" />

            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <x-button primary label="Save" wire:click="save" />
            </div>
        </div>
    </x-slot>
</x-modal.card>
