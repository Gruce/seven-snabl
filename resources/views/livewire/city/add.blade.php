<div>
    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-3 mt-5">
        <div>
            <x-input wire:model.defer="city.name" label=" اسم المنطقة" placeholder="ادخل اسم المنطقة " />
        </div>
        <div>
            <x-input wire:model.defer="city.code" label=" رمز المنطقة " placeholder="ادخل الرمز " />
        </div>
    </div>

    <x-button class="mt-10" x-on:click="close" wire:click="save" primary label="اضافة" />


</div>
