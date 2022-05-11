<div>
    <x-card title="المعلومات الشخصية">
        <form x-data="{ formStep: 1 }">

            <!-- Date & number -->
            <div x-show="formStep === 1">
                <div class="px-10">
                    <div class="mt-5">
                        <x-input wire:model="firstName" label="تاريخ التنظيم" placeholder="User's first name" type="date" />
                    </div>
                    <div class="mt-10">
                        <x-input wire:model="firstName" label="رقم الاستمارة" placeholder="User's first name" type="number" />
                    </div>
                    <div class="mt-10">
                        <x-select
                            label="رمز المنطقة"
                            wire:model="model"
                            placeholder="Select some user"
                            :async-data="route('index')"
                            option-label="name" option-value="id"
                        />
                    </div>
                </div>

                <div class="flex justify-end px-10">
                    <button @click="formStep += 1" class="p-3 mt-4 text-white bg-black rounded-lg" type="button">
                        التالي
                    </button>
                </div>
            </div>

            <!-- Poverty level -->
            <div x-show="formStep === 2" class="space-y-4">
                <div class="grid grid-cols-6 gap-4 px-10">
                    <div>
                        <h1 class="text-lg">مستوى الفقر</h1>
                        <span class="text-xs">يحدد من قبل لجنة الكشف</span>
                    </div>
                    <div class="col-span-5 w-auto">
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label>B1</label>
                                <x-radio id="top-label" lg wire:model.defer="model" />
                            </div>
                            <div>
                                <label>B2</label>
                                <x-radio id="top-label" lg wire:model.defer="model" />
                            </div>
                            <div>
                                <label>B3</label>
                                <x-radio id="top-label" lg wire:model.defer="model" />
                            </div>
                            <div>
                                <label>B4</label>
                                <x-radio id="top-label" lg wire:model.defer="model" />
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!-- ! Family head name -->
            <div x-show="formStep === 3" class="space-y-4">
                <div class="px-10">
                    <div class="grid grid-cols-10 gap-5">
                        <div class="col-span-10 w-auto">
                            <x-input label="اسم رب الاسرة" placeholder="ادخل الاسم" />
                        </div>
                    </div>
                    <div class="grid grid-cols-10 gap-10 mt-10">
                        <div>
                            <h1 class="text-lg">النسب</h1>
                        </div>
                        <div class="col-span-4 w-auto">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>سيد</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>عامي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-lg">الحالة</h1>
                        </div>
                        <div class="col-span-4 w-auto">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>حي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>متوفي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Family head work -->
            <div x-show="formStep === 4" class="space-y-4">
                <div class="grid grid-cols-2 gap-10 px-10">
                    <div>
                        <div>
                            <x-input label="عمل رب الاسرة" placeholder="ادخل العمل " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <x-input label="مقدار الدخل الشهري" placeholder="ادخل المقدار " />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Family wife name -->
            <div x-show="formStep === 5" class="space-y-4">
                <div class="px-10">
                    <div class="grid grid-cols-10 gap-5 mt-10">
                        <div class="col-span-10 w-auto">
                            <x-input label="اسم ربة الاسرة" placeholder="ادخل الاسم" />
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-10 mt-10">
                        <div>
                            <h1 class="text-lg">النسب</h1>
                        </div>
                        <div class="col-span-4 w-auto">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>سيد</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>عامي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-lg">الحالة</h1>
                        </div>
                        <div class="col-span-6 w-auto">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>حي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>متوفي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>مطلقة</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>أرملة</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Location -->
            <div x-show="formStep === 6" class="space-y-4">
                <div class="grid grid-cols-2 gap-10 px-10">
                    <div>
                        <div>
                            <x-input label="عنوان السكن" placeholder="ادخل العنوان " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <x-input label="اقرب نقطة دالة" placeholder="ادخل العنوان " />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Living -->
            <div x-show="formStep === 7" class="space-y-4">
                <div class="px-10">
                    <div class="grid grid-cols-10 gap-10">
                        <div>
                            <h1 class="text-lg">نوع السكن</h1>
                        </div>
                        <div class="col-span-4 w-auto">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>ملك</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>تجاوز</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>ايجار</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>زراعي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-10 gap-5 mt-14">
                        <div class="col-span-10 w-auto">
                            <x-input label="مقدار الايجار الشهري" placeholder="ادخل المقدار" />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Family member work & family count  -->
            <div x-show="formStep === 8" class="space-y-4">
                <div class="grid grid-cols-2 gap-10 px-10">
                    <div>
                        <div>
                            <x-input label="عمل افراد الاسرة" placeholder="ادخل العمل " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <x-input label="عددهم" placeholder="ادخل العدد " />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Have Salary & Amount -->
            <div x-show="formStep === 9" class="space-y-4">
                <div class="px-10">
                    <div class="grid grid-cols-10 gap-10">
                        <div>
                            <h1 class="text-lg">هل يتقاضى راتب ؟</h1>
                        </div>
                        <div class="col-span-4 w-auto">
                            <div class="grid grid-cols-5 gap-6">
                                <div>
                                    <label>تقاعد</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>رعاية</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>مؤسسة</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>مساعدات</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                                <div>
                                    <label>حكومي</label>
                                    <x-radio id="top-label" lg wire:model.defer="model" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-10 gap-5 mt-14">
                        <div class="col-span-10 w-auto">
                            <x-input label="مقداره" placeholder="ادخل المقدار" />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Family phonenumbers -->
            <div x-show="formStep === 10" class="space-y-4">
                <div class="grid grid-cols-2 gap-10 px-10">
                    <div>
                        <div>
                            <x-input label="رقم هاتف الاب" placeholder="ادخل الرقم " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <x-input label="رقم هاتف الاب" placeholder="ادخل الرقم " />
                        </div>
                    </div>
                </div>
                @livewire('form.accessories.buttons')
            </div>

            <!--  Family member -->
            <div x-show="formStep === 11" class="space-y-4">

                <p class="text-xl font-bold">اسماء افراد العائلة</p>

                <!--  Buttons -->
                <div class="grid grid-cols-2 gap-4 px-10">
                    <div class="flex justify-start">
                        <button @click="formStep -= 1" class="p-3 text-white bg-black rounded-lg" type="button">
                            عودة
                        </button>
                    </div>
                    <div class="flex justify-end">
                        <button class="p-3 text-white bg-black rounded-lg" type="submit">
                            ارسال
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </x-card>
</div>
