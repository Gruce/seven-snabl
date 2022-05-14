<div>
    <x-card shadow=false>
        <form x-data="{ formStep: 1 }" wire:submit.prevent="save" >
            <!-- Date & number -->
            {{-- <div x-show="formStep === 1">
                <div class="px-10">
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-4 px-10">
                        <div class="border rounded p-3 m-2">
                            <x-input  label="تاريخ التنظيم" placeholder="User's first name" type="date" />
                        </div>
                        <div class="border rounded p-3 m-2">
                            <x-input  label="رقم الاستمارة" placeholder="User's first name" type="number" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end px-10 mt-5">
                    <x-button label="التالي" primary @click="formStep += 1" />
                </div>
            </div> --}}

            <!-- Poverty level -->
            <div x-show="formStep === 1" class="space-y-4">
                <div class="grid lg:grid-cols-1 px-10">
                    <div class="lg:col-span-2" dir="rtl">
                        <x-select
                            label="مستوى الفقر"
                            placeholder="اختر مستوى الفقر"
                            :options="[
                                ['name'=>'B1', 'value' => 1 ],
                                ['name'=>'B2', 'value' => 2 ],
                                ['name'=>'B3', 'value' => 3 ],
                                ['name'=>'B4', 'value' => 4 ],
                                ]"
                            option-label="name"
                            option-value="value"
                            wire:model.defer="form.person.level"
                        />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!-- Head info -->
            <div x-show="formStep === 2" class="space-y-4">
                <span class="text-lg">معلومات رب الاسرة</span>
                <div class="px-10">
                    <div class="grid gap-5 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1">
                        <div class="sm:col-span-10 xs:col-span-10">
                            <div class="border rounded p-3 m-2">
                                <x-input wire:model.defer="form.head_family.name" label="اسم رب الاسرة" placeholder="ادخل الاسم" />
                            </div>
                        </div>
                        <div class="sm:col-span-10" xs:col-span-10>
                            <div class="border rounded p-3 m-2">
                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1 justify-center">
                                    <x-select
                                        label="النسب"
                                        placeholder="اختر النسب"
                                        :options="[
                                            ['name'=> 'سيد' , 'value'=> true],
                                            ['name'=> 'عامي' , 'value'=> false ]
                                            ]"
                                        option-label="name"
                                        option-value="value"
                                        wire:model.defer="form.head_family.is_mr"
                                    />
                                    <x-select
                                        label="الحالة"
                                        placeholder="اختر الحالة"
                                        :options="[
                                            ['name'=> 'حي', 'value'=> true],
                                            ['name'=> 'متوفي', 'value'=> false]
                                            ]"
                                        option-label="name"
                                        option-value="value"
                                        wire:model.defer="form.head_family.is_alive"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-5 mt-10 lg:grid-cols-2 sm:grid-cols-1">
                        <div>
                            <div class="border rounded p-3 m-2">
                                <x-input wire:model.defer="form.head_family.job" label="عمل رب الاسرة" placeholder="ادخل العمل " />
                            </div>
                        </div>
                        <div>
                            <div class="border rounded p-3 m-2">
                                <x-input type="number" wire:model.defer="form.head_family.salary" label="مقدار الدخل الشهري" placeholder="ادخل المقدار " />
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <div class="border rounded p-3 m-2">
                            <x-select
                                label="هل يتقاضى راتب ؟"
                                placeholder="اختر الراتب"
                                :options="[
                                    ['name'=> 'تقاعد', 'id'=> 1],
                                    ['name'=> 'رعاية', 'id'=> 2],
                                    ['name'=> 'مؤسسة', 'id'=> 3],
                                    ['name'=> 'مساعدات', 'id'=> 4],
                                    ['name'=> 'حكومي', 'id'=> 5]
                                    ]"
                                option-label="name"
                                option-value="id"
                                wire:model.defer="form.person.have_salary"
                            />
                        </div>
                        <div class="border rounded p-3 m-2">
                            <x-input type="number" wire:model.defer="form.person.salary" label="مقداره" placeholder="ادخل مقداره" />
                        </div>
                    </div>
                    <div class="mt-10">
                        <div class="border rounded p-3 m-2">
                            <x-input type="number" wire:model.defer="form.person.father_phonenumber" label="رقم هاتف الاب" placeholder="ادخل الرقم " />
                        </div>
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Wife info -->
            <div x-show="formStep === 3" class="space-y-4">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-5 px-10">
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.wife.name" label="اسم ربة الاسرة" placeholder="ادخل الاسم" />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-select
                            label="النسب"
                            placeholder="اختر النسب"
                            :options="[
                                ['name'=> 'علوية', 'value'=> true],
                                ['name'=> 'عامية', 'value'=> false],
                                ]"
                            option-label="name"
                            option-value="value"
                            wire:model.defer="form.wife.name"
                        />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.person.mother_phonenumber" label="رقم هاتف الام" placeholder="ادخل الرقم " />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-select
                            label="الحالة"
                            placeholder="اختر الحالة"
                            :options="[
                                ['name'=> 'حي', 'id'=> 1 ],
                                ['name'=> 'متوفية', 'id'=> 2 ],
                                ['name'=> 'مطلقة', 'id'=> 3 ],
                                ['name'=> 'أرملة', 'id'=> 4 ],
                                ]"
                            option-label="name"
                            option-value="id"
                            wire:model.defer="form.wife.state"
                        />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Location -->
            <div x-show="formStep === 4" class="space-y-4">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-2 px-10">
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.person.location" label="عنوان السكن" placeholder="ادخل العنوان " />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.person.point" label="اقرب نقطة دالة" placeholder="ادخل العنوان " />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-select
                            label="نوع السكن"
                            placeholder="اختر نوع السكن"
                            :options="[
                                ['name'=> 'ملك',  'id' => 1],
                                ['name'=> 'تجاوز','id' => 2],
                                ['name'=> 'ايجار','id' => 3],
                                ['name'=> 'زراعي','id' => 4]
                                ]"
                            option-label="name"
                            option-value="id"
                            wire:model.defer="form.person.location_type"
                        />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.person.rent" label="مقدار الايجار الشهري" placeholder="ادخل المقدار" />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Family member info  -->
            <div x-show="formStep === 5" class="space-y-4">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-10 px-10">
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.defer="form.person.family_work" label="عمل افراد الاسرة" placeholder="ادخل العمل " />
                    </div>
                    <div class="border rounded p-3 m-2">
                        <x-input wire:model.lazy="form.person.family_count" label="عددهم" placeholder="ادخل العدد " />
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
