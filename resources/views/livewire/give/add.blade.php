<x-modal.card title="اضافة هبة" blur wire:model.defer="cardModal">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-1">
        <x-select label="اختر الهبة" wire:model="give.type" placeholder="اختر الهبة" :async-data="route('give_types_select')"
            option-label="name" option-value="id" />

        <x-textarea wire:model="give.note" label="الملاحظات" placeholder="الملاحظات" />

    </div>

    <div>
        <div class="flex justify-between gap-x-4">
            <div class="flex">
                <x-button flat label="الغاء" x-on:click="close" />
                <x-button  x-on:click="close" primary label="حفظ" wire:click="save" />
            </div>
        </div>
    </div>
</x-modal.card>
