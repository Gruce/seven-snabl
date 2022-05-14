<div>
    <x-card title="المعلومات الشخصية">
        <form x-data="{ formStep: 1 }" wire:submit.prevent="save">

            <!-- Date & number -->
            <div x-show="formStep === 1">
                <div class="px-10">
                    <div class="mt-5">
                        <x-datetime-picker
                            label="Appointment Date"
                            placeholder="تاريخ التنظيم"
                            wire:model.defer="firstName"
                            without-time
                        />
                        {{-- <x-input wire:model.defer="firstName" label="تاريخ التنظيم" placeholder="User's first name" type="date" /> --}}
                    </div>
                    <div class="mt-10">
                        <x-input wire:model.defer="firstName" label="رقم الاستمارة" placeholder="User's first name" type="number" />
                    </div>
                    <div class="mt-10">
                        <x-select label="رمز المنطقة"
                            wire:model.lazy="form.city.id"
                            placeholder="Select city"
                            :async-data="route('cities_select')"
                            {{-- :options="$cities" --}}
                            clearable="false"
                            option-label="name" option-value="id"
                        />
                    </div>
                </div>

                <div class="flex justify-end px-10 mt-5">
                    <x-button label="التالي" primary @click="formStep += 1" />
                </div>
            </div>

            <!-- Poverty level -->
            <div x-show="formStep === 2" class="space-y-4">
                <div class="grid grid-cols-6 gap-4 px-10">
                    <div>
                        <h1 class="text-lg">مستوى الفقر</h1>
                        <span class="text-xs">يحدد من قبل لجنة الكشف</span>
                    </div>
                    <div class="w-auto col-span-5">
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label>B1</label>
                                <x-radio value="1" lg wire:model.defer="form.person.level" />
                            </div>
                            <div>
                                <label>B2</label>
                                <x-radio value="2" lg wire:model.defer="form.person.level" />
                            </div>
                            <div>
                                <label>B3</label>
                                <x-radio value="3" lg wire:model.defer="form.person.level" />
                            </div>
                            <div>
                                <label>B4</label>
                                <x-radio value="4" lg wire:model.defer="form.person.level" />
                            </div>
                        </div>
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!-- Head info -->
            <div x-show="formStep === 3" class="space-y-4">
                <div class="px-10">
                    <div class="grid grid-cols-10 gap-5">
                        <div class="w-auto col-span-10">
                            <x-input wire:model.defer="form.head_family.name" label="اسم رب الاسرة" placeholder="ادخل الاسم" />
                        </div>
                    </div>
                    <div class="grid grid-cols-10 gap-5 mt-10">
                        <div>
                            <h1 class="text-lg">النسب</h1>
                        </div>
                        <div class="w-auto col-span-4">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>سيد</label>
                                    <x-radio value="1" lg wire:model.defer="form.head_family.is_mr" />
                                </div>
                                <div>
                                    <label>عامي</label>
                                    <x-radio value="0" lg wire:model.defer="form.head_family.is_mr" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-lg">الحالة</h1>
                        </div>
                        <div class="w-auto col-span-4">
                            <div class="grid grid-cols-4 gap-6">
                                <div>
                                    <label>حي</label>
                                    <x-radio value="1" lg wire:model.defer="form.head_family.is_alive" />
                                </div>
                                <div>
                                    <label>متوفي</label>
                                    <x-radio value="0" lg wire:model.defer="form.head_family.is_alive" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 mt-10">
                        <div>
                            <x-input wire:model.defer="form.head_family.job" label="عمل رب الاسرة" placeholder="ادخل العمل " />
                        </div>
                        <div>
                            <x-input wire:model.defer="form.head_family.salary" label="مقدار الدخل الشهري" placeholder="ادخل المقدار " />
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-5 mt-10">
                        <div class="col-span-2">
                            <h1 class="text-lg">هل يتقاضى راتب ؟</h1>
                        </div>
                        <div class="w-auto col-span-4">
                            <div class="grid grid-cols-5 gap-6">
                                <div>
                                    <label>تقاعد</label>
                                    <x-radio value="1" lg wire:model.defer="form.person.have_salary" />
                                </div>
                                <div>
                                    <label>رعاية</label>
                                    <x-radio value="2" lg wire:model.defer="form.person.have_salary" />
                                </div>
                                <div>
                                    <label>مؤسسة</label>
                                    <x-radio value="3" lg wire:model.defer="form.person.have_salary" />
                                </div>
                                <div>
                                    <label>مساعدات</label>
                                    <x-radio value="4" lg wire:model.defer="form.person.have_salary" />
                                </div>
                                <div>
                                    <label>حكومي</label>
                                    <x-radio value="5" lg wire:model.defer="form.person.have_salary" />
                                </div>
                            </div>
                        </div>
                        <div class="w-auto col-span-6">
                            <x-input wire:model.defer="form.person.salary" label="مقداره" placeholder="ادخل مقداره" />
                        </div>
                    </div>
                    <div class="mt-10">
                        <x-input wire:model.defer="form.person.father_phonenumber" label="رقم هاتف الاب" placeholder="ادخل الرقم " />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Wife info -->
            <div x-show="formStep === 4" class="space-y-4">
                <div class="grid grid-cols-10 gap-5 px-10">
                    <div class="col-span-10">
                        <x-input wire:model.defer="form.wife.name" label="اسم ربة الاسرة" placeholder="ادخل الاسم" />
                    </div>
                    <div>
                        <h1 class="text-lg">النسب</h1>
                    </div>
                    <div class="col-span-4">
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label>سيد</label>
                                <x-radio value="1" lg wire:model.defer="form.wife.name" />
                            </div>
                            <div>
                                <label>عامي</label>
                                <x-radio value="0" lg wire:model.defer="form.wife.name" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-lg">الحالة</h1>
                    </div>
                    <div class="col-span-4">
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label>حي</label>
                                <x-radio value="1" lg wire:model.defer="form.wife.state" />
                            </div>
                            <div>
                                <label>متوفية</label>
                                <x-radio value="2" lg wire:model.defer="form.wife.state" />
                            </div>
                            <div>
                                <label>مطلقة</label>
                                <x-radio value="3" lg wire:model.defer="form.wife.state" />
                            </div>
                            <div>
                                <label>أرملة</label>
                                <x-radio value="4" lg wire:model.defer="form.wife.state" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-10">
                        <x-input wire:model.defer="form.person.mother_phonenumber" label="رقم هاتف الام" placeholder="ادخل الرقم " />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Location -->
            <div x-show="formStep === 5" class="space-y-4">
                <div class="grid grid-cols-10 gap-10 px-10">
                    <div class="w-auto col-span-5">
                        <x-input wire:model.defer="form.person.location" label="عنوان السكن" placeholder="ادخل العنوان " />
                    </div>
                    <div class="w-auto col-span-5">
                        <x-input wire:model.defer="form.person.point" label="اقرب نقطة دالة" placeholder="ادخل العنوان " />
                    </div>
                    <div>
                        <h1 class="text-lg">نوع السكن</h1>
                    </div>
                    <div class="w-auto col-span-4">
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label>ملك</label>
                                <x-radio value="1" lg wire:model.defer="form.person.location_type" />
                            </div>
                            <div>
                                <label>تجاوز</label>
                                <x-radio value="2" lg wire:model.defer="form.person.location_type" />
                            </div>
                            <div>
                                <label>ايجار</label>
                                <x-radio value="3" lg wire:model.defer="form.person.location_type" />
                            </div>
                            <div>
                                <label>زراعي</label>
                                <x-radio value="4" lg wire:model.defer="form.person.location_type" />
                            </div>
                        </div>
                    </div>
                    <div class="w-auto col-span-5">
                        <x-input wire:model.defer="form.person.rent" label="مقدار الايجار الشهري" placeholder="ادخل المقدار" />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Family member info  -->
            <div x-show="formStep === 6" class="space-y-4">
                <div class="grid grid-cols-2 gap-10 px-10">
                    <div>
                        <div>
                            <x-input wire:model.defer="form.person.family_work" label="عمل افراد الاسرة" placeholder="ادخل العمل " />
                        </div>
                    </div>
                    <div>
                        <div>
                            <x-input wire:model.lazy="form.person.family_count" label="عددهم" placeholder="ادخل العدد " />
                        </div>
                    </div>
                </div>

                <div class="p-5 m-10 border rounded-lg">
                    <div class="flex items-center justify-between p-2 bg-gray-100 rounded-lg">
                        <span>اسماء افراد العائلة</span>
                        {{-- <x-button label="اضافة" wire:click="addFamilyMember" /> --}}
                    </div>

                    <div class="flex flex-col w-full gap-5 mt-3">
                        @if (isset($form['family_members']))
                            @foreach ($form['family_members'] as $index => $member)
                                <x-input class="w-full" wire:key="{{ $index . now() }}" wire:model.defer="form.family_members.{{ $index }}.name" label="اسم الأفراد" placeholder="ادخل الاسم ">
                                    <x-slot name="prepend">
                                        <div class="absolute inset-y-0 left-0 flex items-center p-0.5">
                                            <x-button
                                                class="h-full rounded-r-md"
                                                icon="trash"
                                                negative
                                                flat
                                                squared
                                                {{-- wire:click="deleteFamilyMember({{ $index }})" --}}
                                            />
                                        </div>
                                    </x-slot>
                                </x-input>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!--  Buttons -->
                <div class="grid grid-cols-2 gap-4 px-10">
                    <div class="flex justify-start">
                        <x-button label="عودة" primary @click="formStep -= 1" />
                    </div>
                    <div class="flex justify-end">
                        <x-button label="ارسال" primary type="submit" />
                    </div>
                </div>
            </div>
        </form>
    </x-card>
</div>
