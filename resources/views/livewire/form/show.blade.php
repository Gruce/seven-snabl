<div>
    <x-card>
        <div class="grid place-content-center lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
            <div class=" basis-1/3">
                <h1 class="text-lg font-bold">
                    مجمع سبع سنابل الطبي الخيري
                </h1>
                <span>لجنة الرعاية الاجتماعية</span>
            </div>
            <div class="flex justify-center basis-1/3 ">
                <img width="100" height="100" src="{{ asset('img/a.png') }}">
            </div>
            <div class=" basis-1/3">
                <div class="flex flex-row justify-end gap-2 ">
                    <div class="text-sm"> تاريخ التنظيم</div>
                    <span class="text-sm">{{ $form->format_date }}</span>
                </div>
                <div class="flex flex-row justify-end gap-2">
                    <div class="text-sm"> رقم الاستمارة </div>
                    <div class="text-sm">-{{$form->id}}-</div>
                </div>
                <div class="flex flex-row justify-end gap-2">
                    <div class="text-sm"> رمز المنطقة</div>
                    <div class="text-sm">{{$form->city->code}}</div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-lg font-semibold text-center">
                استمارة كشف العوائل المتعففة
            </h1>
        </div>
        {{-- <br>
        <div>
            <h1 class="text-sm font-semibold text-center ">
                المعلومات الشخصية
            </h1>
        </div> --}}
        {{-- OLD DATA --}}
        {{-- <x-card shadow=false class="border-transparent ">
            <div class="relative mt-10 overflow-x-auto sm:rounded-lg" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                مستوى الفقر
                            </th>
                            <th scope="col" class="px-6 py-3">
                                اسم رب الاسرة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                النسب
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الحالة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                عمل رب الاسرة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                مقدار الدخل الشهري
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white  border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 hover:bg-gray-200 whitespace-nowrap">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{ $form->person->level_name }}</button>
                                    <ul x-show="open" @click.away="open = false">
                                        <x-select
                                        :options="[
                                            ['name' => 'B1',  'id' => 1],
                                            ['name' => 'B2', 'id' => 2],
                                            ['name' => 'B3',   'id' => 3],
                                            ['name' => 'B4',    'id' => 4],
                                        ]"
                                        wire:model.lazy="input.person.level"
                                        option-label="name"
                                        option-value="id"
                                    />
                                    </ul>
                                </div>
                            </th>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{ $form->head_family->name }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.head_family.name" type="text"/>
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->is_mr_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.head_family.is_mr" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->is_alive }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.head_family.is_alive" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->job }} </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.head_family.job" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> @money($form->head_family->salary, 'IQD')
                                    </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.head_family.salary" type="text"/>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative mt-10 overflow-x-auto sm:rounded-lg" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                اسم الزوجة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                النسب
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الحالة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                رقم هاتف الاب
                            </th>
                            <th scope="col" class="px-6 py-3">
                                رقم هاتف الام
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">

                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->name }} </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.wife.name" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->is_mis_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.wife.is_mis" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->is_alive }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.wife.state" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->father_phonenumber }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.father_phonenumber" type="text"/>
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->mother_phonenumber }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.mother_phonenumber" type="text"/>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative mt-10 overflow-x-auto sm:rounded-lg" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                عنوان السكن
                            </th>
                            <th scope="col" class="px-6 py-3">
                                اقرب نقطة دالة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                نوع السكن
                            </th>
                            <th scope="col" class="px-6 py-3">
                                مقدار الايجاد الشهري
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->location }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.location" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->point }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.point" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->location_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.location_type" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->location_name == 'ايجار' ? $form->person->rent : 'لايوجد' }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.rent" type="text"/>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative mt-10 overflow-x-auto sm:rounded-lg" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                عمل افراد الاسرة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                عددهم
                            </th>
                            <th scope="col" class="px-6 py-3">
                                هل يتقاضى راتب
                            </th>
                            <th scope="col" class="px-6 py-3">
                                مقداره
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->family_work }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.family_work" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->family_count }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.family_count" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->salary != '0' ? 'نعم' : 'لا' }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.have_salary" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> @money($form->person->salary, 'IQD') </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.person.salary" type="text"/>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-10 font-semibold text-center">
                <h1>
                    اسماء افراد العائلة
                </h1>
            </div>
            <div class="relative mt-10 overflow-x-auto sm:rounded-lg" dir="rtl">
                <table class="w-full text-sm text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الاسم
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الصلة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                التولد
                            </th>
                            <th scope="col" class="px-6 py-3">
                                النسب
                            </th>
                            <th scope="col" class="px-6 py-3">
                                المهنة
                            </th>
                            <th scope="col" class="px-6 py-3">
                                الحالة الصحية
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($form->family_members as $index => $member)
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4 hover:bg-gray-200">{{ $loop->iteration }}</td>

                            <td x-data="{ open: false }" class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->name}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.name" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{$member->kinship_name}}</button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.kinship_name" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->birthday}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.birthday" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->is_mr_name}} </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.is_mr_name" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->job}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.job" type="text"/>
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 hover:bg-gray-200">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->health_state}}  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.health_state" type="text"/>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                لا يوجد بيانات
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                <x-textarea class="w-full mt-3" placeholder="الملاحظات" />
            </div>
            <div class="flex flex-row justify-between mt-5">
                <div>
                    <h1>
                        اسم المتابع
                    </h1>
                </div>
                <div>
                    <h1>
                        تاريخ الكشف 2022/5/13
                    </h1>
                </div>
            </div>
        </x-card> --}}
        {{-- NEW RESPONSIVE DATA --}}
        <x-card shadow=false class="border-transparent">
            {{-- FIRST SECTION --}}
            <div class="border rounded mt-4">
                <h1 class="text-lg items-center p-3">المعلومات الشخصية</h1>
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 text-center m-2 border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm mb-3">مستوى الفقر</h5>
                        <button class="text-center font-semibold" x-show="!open"
                            @click="open = true">{{ $form->person->level_name }}</button>
                        <ul x-show="open" @click.away="open = false">
                            <x-select :options="[
                                ['name' => 'B1', 'id' => 1],
                                ['name' => 'B2', 'id' => 2],
                                ['name' => 'B3', 'id' => 3],
                                ['name' => 'B4', 'id' => 4],
                            ]" wire:model.lazy="input.person.level" option-label="name"
                                option-value="id" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm mb-3">اسم رب الاسرة</h5>
                        <button class="text-sm font-semibold" x-show="!open"
                            @click="open = true">{{ $form->head_family->name }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.head_family.name" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 border  text-center rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">النسب</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{$form->head_family->is_mr_name}} </button>
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-select
                            :options="[
                                ['name' => 'سيد', 'id' => 1],
                                ['name' => 'عامي', 'id' => 2],
                            ]"
                            wire:model.lazy="input.head_family.is_mr"
                            option-label="name"
                            option-value="id"
                        />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center  border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">الحالة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->head_family->is_alive_name }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-select
                            :options="[
                                ['name' => 'حي', 'id' => 1],
                                ['name' => 'متوفي', 'id' => 2],


                            ]"
                            wire:model.lazy="input.head_family.is_alive"
                            option-label="name"
                            option-value="id"
                        />
                        </ul>
                        
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">عمل رب الاسرة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->head_family->job }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.head_family.job" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">مقدار الدخل الشهري</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true"> @money($form->head_family->salary, 'IQD')
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.head_family.salary" type="text" />
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SECOND SECTION --}}
            <div class="border rounded mt-4">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">اسم الزوجة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->wife->name }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.wife.name" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">النسب</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{$form->wife->is_mis_name}} </button>
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-select
                            :options="[
                                ['name' => 'سيد', 'id' => 1],
                                ['name' => 'عامي', 'id' => 2],
                            ]"
                            wire:model.lazy="input.wife.is_mis"
                            option-label="name"
                            option-value="id"
                        />
                        </ul>

                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">الحالة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->wife->wife_state }} </button>
                            <ul x-show="open" @click.away="open = false">
                                <x-select
                                :options="[
                                    ['name' => 'حي', 'id' => 1],
                                    ['name' => 'متوفية', 'id' => 2],
                                    ['name' => 'مطلقة', 'id' => 3],
                                    ['name' => 'ارملة', 'id' => 4],

                                ]"
                                wire:model.lazy="input.wife.state"
                                option-label="name"
                                option-value="id"
                            />
                            </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">رقم هاتف الاب</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->father_phonenumber }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.father_phonenumber"
                                type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">رقم هاتف الام</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->mother_phonenumber }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.mother_phonenumber"
                                type="text" />
                        </ul>
                    </div>
                </div>
            </div>
            {{-- THIRD SECTION --}}
            <div class="border rounded mt-4 ">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">عنوان السكن </h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->location }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.location" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">اقرب نقطة دالة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->point }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.point" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 border text-center rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">نوع السكن</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->location_name }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.location_type" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">مقدار الايجاد الشهري</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->location_name == 'ايجار' ? $form->person->rent : 'لايوجد' }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.rent" type="text" />
                        </ul>
                    </div>
                </div>
            </div>
            {{-- FIRD xD SECTION --}}
            <div class="border rounded mt-4 ">
                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">عمل افراد الاسرة</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->family_work }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.family_work" type="text" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">عددهم</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                            {{ $form->person->family_count }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.family_count" type="number" />
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">هل يتقاضى راتب</h5>
                        <h6 class="text-center font-semibold" >
                            {{ $form->person->salary != '0' ? 'نعم' : 'لا' }}
                        </h6>

                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">مقداره</h5>
                        <button class="text-center font-semibold" x-show="!open" @click="open = true"> @money($form->person->salary, 'IQD')
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <x-input class="w-64" wire:model.lazy="input.person.salary" type="text" />
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SIX SECTION --}}
            <div class="border rounded mt-4">
                <h5 class="text-lg p-3">اسماء افراد العائلة</h5>
                <div class="grid lg:grid-cols-1 md:grid-cols-2 sm:grid-cols-1">
                    @if (isset($form['family_members']))
                        @forelse ($form ['family_members'] as $index => $member)
                            <x-card shadow=false :title="'#' . $loop->index + 1 . ' ' . $member->name">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50  "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">الاسم</h5>
                                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                                            {{ $member->name }} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64"
                                                wire:model.lazy="input.family_members.{{ $index }}.name"
                                                type="text" />
                                        </ul>
                                    </div>
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50 "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">الصلة</h5>
                                        <button class="text-center font-semibold" x-show="!open"
                                            @click="open = true">{{ $member->kinship_name}}</button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-select :options="[
                                                ['name' => 'اب', 'id' => 1],
                                                ['name' => 'ام', 'id' => 2],
                                                ['name' => 'ابن', 'id' => 3],
                                                ['name' => 'جد', 'id' => 4],
                                                ['name' => 'جدة', 'id' => 5],
                                                ['name' => 'اخ', 'id' => 6],
                                                ['name' => 'اخت', 'id' => 7],
                                                ['name' => 'حفيد', 'id' => 8],
                                            ]"
                                                wire:model.lazy="input.family_members.{{ $index }}.kinship"
                                                option-label="name" option-value="id" />

                                        </ul>
                                    </div>
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50 "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">التولد</h5>
                                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                                            {{ $member->birthday }} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64"
                                                wire:model.lazy="input.family_members.{{ $index }}.birthday"
                                                type="text" />
                                        </ul>
                                    </div>
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50 "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">النسب</h5>
                                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                                            {{ $member->is_mr_name }} </button>

                                            <ul x-show="open" @click.away="open = false">
                                                <x-select
                                                :options="[
                                                    ['name' => 'سيد', 'id' => 1],
                                                    ['name' => 'عامي', 'id' => 2],
                                                ]"
                                                wire:model.lazy="input.family_members.{{ $index }}.is_mr"
                                                option-label="name"
                                                option-value="id"
                                            />
                                            </ul>

                                    </div>
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50 "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">المهنة</h5>
                                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                                            {{ $member->job }} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64"
                                                wire:model.lazy="input.family_members.{{ $index }}.job"
                                                type="text" />
                                        </ul>
                                    </div>
                                    <div class="p-3 m-2 text-center border rounded bg-gray-50 "
                                        x-data="{ open: false }">
                                        <h5 class="text-sm">الحالة الصحية</h5>
                                        <button class="text-center font-semibold" x-show="!open" @click="open = true">
                                            {{ $member->health_state }} </button>
                                        <ul x-show="open" @click.away="open = false">
                                            <x-input class="w-64"
                                                wire:model.lazy="input.family_members.{{ $index }}.health_state"
                                                type="text" />
                                        </ul>
                                    </div>
                                </div>
                            </x-card>
                            {{-- <div class="p-3 m-2 border rounded bg-gray-50 " x-data="{ open: false }">
                        <h5 class="text-sm">{{ $loop->iteration }}</h5>
                        <div x-data="{ open: false }" class="px-6 py-4 hover:bg-gray-200">
                            <div x-data="{ open: false }">
                                <button x-show="!open" @click="open = true"> {{$member->name}} </button>

                                <ul x-show="open" @click.away="open = false">
                                    <x-input class="w-64" wire:model.lazy="input.family_members.{{$index}}.name" type="text"/>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                        @empty
                            <h2>لا يوجد بيانات</h2>
                        @endforelse
                    @endif
                </div>
            </div>
        </x-card>
    </x-card>
</div>
