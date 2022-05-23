<div>
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <x-input wire:model.defer="user.name" label=" اسم المستخدم" placeholder="ادخل اسم المستخدم  " />
        </div>
        <div>
            <x-input dir="ltr" suffix="@gmail.com"  wire:model.defer="user.email" label="  البريد الالكتروني " placeholder="ادخل البريد الالكتروني "  />
        </div>
        <div>
            <x-input wire:model.defer="user.password" label=" الرمز السري " placeholder="ادخل الرمز " />
        </div>
        <div>
            <x-select label="نوع المستخدم" placeholder="اختر نوع المستخدم" :options="[
                ['name'=> 'مشرف',   'id'=> 1 ],
                ['name'=> 'مخول', 'id'=> 3 ],
                ]" wire:model.defer="user.is_admin" option-label="name" option-value="id" />
        </div>
        <div>
            <x-input  wire:model.defer="user.phonenumber"  label="  رقم الهاتف    "  />
        </div>
    </div>
    <x-button class="mt-5" x-on:click="close" primary label="اضافة" wire:click="save" />
</div>
