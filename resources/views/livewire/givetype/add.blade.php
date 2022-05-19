<div>
    <div class="grid grid-cols-1 gap-2">
        <x-input class="col-span-2" label="نوع الهبة" wire:model.defer="give.name" />
        <x-button class="" wire:click="save" primary label="اضافة" />
    </div>
</div>
