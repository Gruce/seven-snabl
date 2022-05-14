<div>
    <x-card shadow=false>
        <form x-data="{ formStep: 1 }" wire:submit.prevent="save" >
            <!-- Date & number -->

            <!-- Head info -->
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
                    <div class="p-2 mt-1 border rounded">
                        <div x-show="activeTab === 'first'">
                            <div class="grid lg:grid-cols-1">
                                <div class="p-3 m-2 border rounded">
                                    <x-select
                                        label="مستوى الفقر"
                                        placeholder="اختر مستوى الفقر"
                                        :options="[
                                            ['name' => 'B1',  'id' => 1],
                                            ['name' => 'B2', 'id' => 2],
                                            ['name' => 'B3',   'id' => 3],
                                            ['name' => 'B4',    'id' => 4],
                                        ]"
                                        wire:model.defer="form.person.level"
                                        option-label="name"
                                        option-value="id"
                                    />
                                </div>
                            </div>
                            <div class="grid gap-2 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1">
                                <div class="p-3 m-2 border rounded">
                                    <x-input wire:model.defer="form.head_family.name" label="اسم رب الاسرة" placeholder="ادخل الاسم" />
                                </div>
                                <div class="p-3 m-2 border rounded">
                                    <div class="grid justify-center gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                        <x-select
                                            label="النسب"
                                            placeholder="اختر النسب"
                                            :options="['سيد', 'عامي']"
                                            wire:model.defer="form.head_family.is_mr"
                                        />
                                        <x-select
                                            label="الحالة"
                                            placeholder="اختر الحالة"
                                            :options="['حي', 'متوفي']"
                                            wire:model.defer="form.head_family.is_alive"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-5 lg:grid-cols-2 sm:grid-cols-1">
                                <div>
                                    <div class="p-3 m-2 border rounded">
                                        <x-input wire:model.defer="form.head_family.job" label="عمل رب الاسرة" placeholder="ادخل العمل " />
                                    </div>
                                </div>
                                <div>
                                    <div class="p-3 m-2 border rounded">
                                        <x-input wire:model.defer="form.head_family.salary" label="مقدار الدخل الشهري" placeholder="ادخل المقدار " />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-show="activeTab === 'second'">
                            <div class="px-5">
                                <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                                    <div class="p-3 m-2 border rounded">
                                        <x-select
                                            label="هل يتقاضى راتب ؟"
                                            placeholder="اختر الراتب"
                                            :options="['تقاعد', 'رعاية','مؤسسة','مساعدات','حكومي']"
                                            wire:model.defer="form.person.have_salary"
                                        />
                                    </div>
                                    <div class="p-3 m-2 border rounded">
                                        <x-input wire:model.defer="form.person.salary" label="مقداره" placeholder="ادخل مقداره" />
                                    </div>
                                </div>
                                <div>
                                    <div class="p-3 m-2 border rounded">
                                        <x-input wire:model.defer="form.person.father_phonenumber" label="رقم هاتف الاب" placeholder="ادخل الرقم " />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Wife info -->
            <div x-show="formStep === 2" class="space-y-4">
                <span class="text-lg">معلومات ربة الاسرة</span>
                <div class="grid gap-5 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.wife.name" label="اسم ربة الاسرة" placeholder="ادخل الاسم" />
                    </div>
                    <div class="p-3 border rounded">
                        <x-select
                            label="النسب"
                            placeholder="اختر النسب"
                            :options="['سيد', 'عامي']"
                            wire:model.defer="form.wife.name"
                        />
                    </div>
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.person.mother_phonenumber" label="رقم هاتف الام" placeholder="ادخل الرقم " />
                    </div>
                    <div class="p-3 border rounded">
                        <x-select
                            label="الحالة"
                            placeholder="اختر الحالة"
                            :options="['حي', 'متوفية','مطلقة','أرملة']"
                            wire:model.defer="form.wife.state"
                        />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Location -->
            <div x-show="formStep === 3" class="space-y-4">
                <span class="text-lg">معلومات السكن</span>
                <div class="grid gap-2 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.person.location" label="عنوان السكن" placeholder="ادخل العنوان " />
                    </div>
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.person.point" label="اقرب نقطة دالة" placeholder="ادخل العنوان " />
                    </div>
                    <div class="p-3 border rounded">
                        <x-select
                            label="نوع السكن"
                            placeholder="اختر نوع السكن"
                            :options="['ملك', 'تجاوز','ايجار','زراعي']"
                            wire:model.defer="form.person.location_type"
                        />
                    </div>
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.person.rent" label="مقدار الايجار الشهري" placeholder="ادخل المقدار" />
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>

            <!--  Family member info  -->
            <div x-show="formStep === 4" class="space-y-4">
                <span class="text-lg">معلومات اعضاء الفريق</span>
                <div class="grid gap-10 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 border rounded">
                        <x-input wire:model.defer="form.person.family_work" label="عمل افراد الاسرة" placeholder="ادخل العمل " />
                    </div>
                    <div class="p-3 border rounded">
                        <x-input wire:model.lazy="form.person.family_count" label="عددهم" placeholder="ادخل العدد " />
                    </div>
                </div>
                <div class="p-5 border rounded-lg">
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
                <div class="grid grid-cols-2 gap-4 px-5">
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
