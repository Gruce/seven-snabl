<div class="grid grid-cols-2 gap-4 px-10">
    <div class="flex justify-start" x-show="formStep > 1">
        <x-button
            class="bg-blue-600"
            label="عودة"
            primary
            x-on:click="width -=30"
            @click="formStep -= 1"
        />
    </div>
    <div class="flex justify-end" x-show="formStep <= 3">
        <x-button
            class="bg-blue-600"
            label="التالي"
            primary
            x-on:click="width += 30"
            @click="formStep += 1"
        />
    </div>
    <div class="flex justify-end" x-show="formStep == 4">
        <x-button
            class="bg-blue-600"
            label="ارسال"
            primary
            type="submit" />
    </div>
</div>
