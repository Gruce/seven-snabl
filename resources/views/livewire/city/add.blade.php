<div>
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <x-input wire:model.defer="" label=" اسم المنطقة" placeholder="ادخل اسم المنطقة " />
        </div>
        <div>
            <x-input wire:model.defer="" label=" رمز المنطقة " placeholder="ادخل الرمز " />
        </div>
    </div>

    <x-button class="mt-10 w-full" wire:click="form.add()" primary label="اضافة" />

    
</div>
