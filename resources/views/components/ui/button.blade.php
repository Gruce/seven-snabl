<div>
    <div class="grid grid-cols-2 gap-4 px-10">
        <div class="flex justify-start">
            <x-button label="عودة"
                primary
                @click="formStep -= 1"
            />
        </div>
        <div class="flex justify-end">
            <x-button label="التالي"
                primary
                @click="formStep += 1"
            />
        </div>
    </div>
</div>
