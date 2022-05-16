<div>
    <x-card shadow=false>
        <form
            x-data="{ formStep: 1 ,  width: '10' }"
            x-init="width=10"
            wire:submit.prevent="save">

            <!-- Start Progress Bar -->
            <div class="max-w-full mb-4">
                <div
                    class="bg-gray-50 rounded h-4 mt-5"
                    role="progressbar"
                    :aria-valuenow="width"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    >
                    <div
                        class="bg-green-400 rounded h-4 text-center text-sm"
                        :style="`width: ${width}%; transition: width 2s;`"
                        >
                    </div>
                </div>
            </div>
            <!-- End Progress Bar -->

            <!-- FIRST STEP -->
            <div x-show="formStep === 1" class="space-y-4">
                <span class="text-lg">معلومات رب الاسرة</span>
                <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
                    <nav class="mb-5">
                        <ul class="flex">
                            <li class="ml-1 grow">
                                <x-button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full" slate outline href="#first" icon="user" label="المعلومات العامة" />
                                <x-button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full" href="#first" icon="user" label="المعلومات العامة" />
                            </li>
                            <li class="ml-1 grow">
                                <x-button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full" slate outline href="#second" icon="location-marker" label="العمل" />
                                <x-button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full" href="#second" icon="location-marker" label="العمل" />
                            </li>
                        </ul>
                    </nav>
                    <div class="p-2 mt-1">
                        <div x-show="activeTab === 'first'">
                            <div class="grid lg:grid-cols-1">
                                <div class="p-3 m-2 border rounded bg-gray-50 ">
                                    <x-select label="مستوى الفقر" placeholder="اختر مستوى الفقر" :options="[
                                            ['name' => 'B1',  'id' => 1],
                                            ['name' => 'B2', 'id' => 2],
                                            ['name' => 'B3',   'id' => 3],
                                            ['name' => 'B4',    'id' => 4],
                                        ]" wire:model.defer="form.person.level" option-label="name" option-value="id" />
                                </div>
                            </div>
                            <div class="grid gap-2 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1">
                                <div class="p-3 m-2 border rounded bg-gray-50">
                                    <x-input wire:model.defer="form.head_family.name" label="اسم رب الاسرة" placeholder="ادخل الاسم" />
                                </div>
                                <div class="p-3 m-2 border rounded bg-gray-50">
                                    <div class="grid justify-center gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                        <x-select label="النسب" placeholder="اختر النسب" :options="[
                                                ['name'=> 'سيد' , 'id' => true],
                                                ['name'=> 'عامي' , 'id' => false],
                                                ]" wire:model.defer="form.head_family.is_mr" option-label="name" option-value="id" />
                                        <x-select label="الحالة" placeholder="اختر الحالة" :options="[
                                                ['name'=> 'حي' , 'id' => true],
                                                ['name'=> 'متوفي' , 'id' => false],
                                                ]" wire:model.defer="form.head_family.is_alive" option-label="name" option-value="id" />
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-5 lg:grid-cols-2 sm:grid-cols-1">
                                <div>
                                    <div class="p-3 m-2 border rounded bg-gray-50">
                                        <x-input wire:model.defer="form.head_family.job" label="عمل رب الاسرة" placeholder="ادخل العمل " />
                                    </div>
                                </div>
                                <div>
                                    <div class="p-3 m-2 border rounded bg-gray-50">

                                        <x-inputs.currency prefix="IQD" thousands="," decimal="," wire:model.defer="form.head_family.salary" label="مقدار الدخل الشهري" placeholder="ادخل المقدار " />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="activeTab === 'second'">
                            <div class="px-5">
                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                    <div class="p-3 m-2 border rounded bg-gray-50">
                                        <x-select label="هل يتقاضى راتب ؟" placeholder="اختر الراتب" :options="[
                                            ['name'=> 'تقاعد', 'id'=> 1 ],
                                            ['name'=> 'رعاية', 'id'=> 2 ],
                                            ['name'=> 'مؤسسة', 'id'=> 3 ],
                                            ['name'=> 'مساعدات', 'id'=> 4 ],
                                            ['name'=> 'حكومي', 'id'=> 5 ]
                                            ]" wire:model.defer="form.person.salary_type" option-label="name" option-value="id" />
                                    </div>
                                    <div class="p-3 m-2 border rounded bg-gray-50">
                                        <x-inputs.currency wire:model.defer="form.person.salary" label="مقداره" placeholder="ادخل مقداره" prefix="IQD" thousands="," decimal="," />
                                    </div>
                                </div>
                                <div>
                                    <div class="p-3 m-2 border rounded bg-gray-50">
                                        <x-inputs.phone wire:model.defer="form.person.father_phonenumber" label="رقم هاتف الاب" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END FIRST STEP -->

            <!-- SECOND STEP -->
            <div x-show="formStep === 2" class="space-y-4">
                <span class="text-lg">معلومات الزوجة</span>
                <div class="grid gap-5 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded bg-gray-50">
                        <x-input wire:model.defer="form.wife.name" label="اسم الزوجة " placeholder="ادخل الاسم" />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-select label="النسب" pla ceholder="اختر النسب" :options="[
                            ['name'=> 'علوية', 'id'=> true ],
                            ['name'=> 'عامية', 'id'=> false ]
                            ]" wire:model.defer="form.wife.name" option-label="name" option-value="id" />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-inputs.phone wire:model.defer="form.person.mother_phonenumber" label="رقم هاتف الام" placeholder="ادخل الرقم " />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-select label="الحالة" placeholder="اختر الحالة" :options="[
                            ['name'=> 'حي' , 'id' => 1 ],
                            ['name'=> 'متوفية' , 'id' => 2 ],
                            ['name'=> 'مطلقة' , 'id' => 3 ],
                            ['name'=> 'أرملة' , 'id' => 4 ]
                            ]" wire:model.defer="form.wife.state" option-label="name" option-value="id" />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END SECOND STEP -->

            <!-- THIRD STEP -->
            <div x-show="formStep === 3" class="space-y-4">
                <span class="text-lg">معلومات السكن</span>
                <div class="grid gap-2 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded bg-gray-50">
                        <x-input wire:model.defer="form.person.location" label="عنوان السكن" placeholder="ادخل العنوان " />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-input wire:model.defer="form.person.point" label="اقرب نقطة دالة" placeholder="ادخل العنوان " />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-select label="نوع السكن" placeholder="اختر نوع السكن" :options="[
                            ['name'=> 'ملك',   'id'=> 1 ],
                            ['name'=> 'تجاوز', 'id'=> 2 ],
                            ['name'=> 'ايجار', 'id'=> 3 ],
                            ['name'=> 'زراعي', 'id'=> 4 ]
                            ]" wire:model.defer="form.person.location_type" option-label="name" option-value="id" />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-inputs.currency prefix="IQD" thousands="," decimal="," wire:model="form.person.rent" label="مقدار الايجار الشهري" placeholder="ادخل المقدار" />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END THIRD STEP -->

            <!-- LAST STEP -->
            <div x-show="formStep === 4" class="space-y-4">
                <span class="text-lg">معلومات افراد العائلة</span>
                <div class="grid gap-10 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded bg-gray-50">
                        <x-input wire:model.defer="form.person.family_work" label="عمل افراد الاسرة" placeholder="ادخل العمل " />
                    </div>
                    <div class="p-3 border rounded bg-gray-50">
                        <x-input type="number" wire:model.lazy="form.person.family_count" label="عددهم" placeholder="ادخل العدد " />
                    </div>
                </div>
                <div class="p-5 border rounded bg-gray-50-lg">
                    <div class="flex items-center justify-between p-2 bg-gray-50 rounded bg-gray-50-lg">
                        <span>اسماء افراد العائلة</span>
                        {{--
                        <x-button label="اضافة" wire:click="addFamilyMember" /> --}}
                    </div>

                    <div class="flex flex-col w-full gap-5 mt-3">
                        @if (isset($form['family_members']))
                        @foreach ($form['family_members'] as $index => $member)
                        <x-input class="w-full" wire:key="{{ $index . now() }}" wire:model.defer="form.family_members.{{ $index }}.name" label="اسم الأفراد" placeholder="ادخل الاسم ">
                            <x-slot name="prepend">
                                <div class="absolute inset-y-0 left-0 flex items-center p-0.5">
                                    <x-button class="h-full rounded bg-gray-50-r-md" icon="trash" negative flat squared {{-- wire:click="deleteFamilyMember({{ $index }})" --}} />
                                </div>
                            </x-slot>
                        </x-input>
                        @endforeach
                        @endif
                    </div>
                </div>
                <!--  Buttons -->
                <x-ui.button></x-ui.button>
            </div>
            <!-- END LAST STEP -->
        </form>
    </x-card>
</div>
