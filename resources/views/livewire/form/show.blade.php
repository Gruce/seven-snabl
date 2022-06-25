<div>
    <x-ui.card class="bg-white">
        <div class="grid place-content-center lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
            <div class="text-center basis-1/3">
                <h1 class="text-lg font-bold ">
                    مجمع سبع سنابل الطبي الخيري
                </h1>
                <span class="">لجنة الرعاية الاجتماعية</span>
            </div>
            <div class="flex justify-center basis-1/3 ">
                <img width="100" height="100" src="{{ asset('img/a.png') }}">
            </div>
            <div class=" basis-1/3">
                <div class="flex flex-row gap-2 place-content-center ">
                    <div class="text-sm"> تاريخ التنظيم</div>
                    <span class="text-sm">{{ $form->format_date }}</span>
                </div>
                <div class="flex flex-row gap-2 place-content-center">
                    <div class="text-sm"> رقم الاستمارة </div>
                    <div class="text-sm">-{{ $form->id }}-</div>
                </div>
                <div class="flex flex-row gap-2 place-content-center">
                    <div class="text-sm"> رمز المنطقة</div>
                    <div class="text-sm">{{ $form->city->code }}</div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-lg font-semibold text-center">
                استمارة كشف العوائل المتعففة
            </h1>
        </div>
        {{-- NEW RESPONSIVE DATA --}}
        <x-ui.card shadow=false class="border-transparent">
            {{-- FIRST SECTION --}}
            <div class="mt-4 border rounded">
                <h1 class="items-center p-3 text-lg">المعلومات الشخصية</h1>
                <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">مستوى الفقر</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">{{ $form->person->level_name }}</button>
                        <ul x-show="open" @click.away="open = false">
                            <select wire:model.lazy="input.person.level" class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>B1</option>
                                <option value="2">B2</option>
                                <option value="3">B3</option>
                                <option value="4">B4</option>
                            </select>
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <div>
                            <h5 class="mb-3 text-sm">اسم رب الاسرة</h5>
                        </div>
                        <button class="text-sm font-semibold" x-show="!open" @click="open = true">{{ $form->head_family->name }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.head_family.name" class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">النسب</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->head_family->is_mr_name }} </button>
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <select wire:model.lazy="input.head_family.is_mr" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>سيد</option>
                                <option value="2">عامي</option>

                            </select>
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">الحالة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->head_family->is_alive_name }}
                        </button>
                        <ul x-show="open" @click.away="open = false">

                            <select wire:model.lazy="input.head_family.is_alive" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>حي</option>
                                <option value="2">متوفي</option>

                            </select>

                        </ul>

                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">عمل رب الاسرة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->head_family->job }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.head_family.job" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">مقدار الدخل الشهري</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true"> @money($form->head_family->salary, 'IQD')
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.head_family.salary" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SECOND SECTION --}}
            <div class="mt-4 border rounded">
                <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">اسم الزوجة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->wife->name }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.wife.name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm ">النسب</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->wife->is_mis_name }} </button>
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <select wire:model.lazy="input.wife.is_mis" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>حي</option>
                                <option value="2">متوفي</option>

                            </select>
                        </ul>

                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">الحالة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->wife->wife_state }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <select wire:model.lazy="input.wife.state" class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>حي</option>
                                <option value="2">متوفية</option>
                                <option value="3">مطلقة</option>
                                <option value="4">ارملة</option>
                            </select>
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">رقم هاتف الاب</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->father_phonenumber }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.father_phonenumber" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">رقم هاتف الام</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->mother_phonenumber }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.mother_phonenumber" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                </div>
            </div>
            {{-- THIRD SECTION --}}
            <div class="mt-4 border rounded ">
                <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">عنوان السكن </h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->location }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.location" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm ">اقرب نقطة دالة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->point }} </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.point" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">نوع السكن</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->location_name }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <select wire:model.lazy="input.person.location_type" class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                <option value="1" selected>ملك</option>
                                <option value="2">تجاوز</option>
                                <option value="3">ايجار</option>
                                <option value="4">زراعي</option>
                            </select>
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">مقدار الايجاد الشهري</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->location_type == 3 ? $form->person->rent : 'لايوجد' }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            @if ($form->person->location_type != 3)
                            <h5>
                                لا يوجد
                            </h5>
                            @else
                            <input type="text" wire:model.lazy="input.person.rent" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            {{-- FIRD xD SECTION --}}
            <div class="mt-4 border rounded ">
                <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2">
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">عمل افراد الاسرة</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->family_work }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.family_work" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">عددهم</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true">
                            {{ $form->person->family_count }}
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="number" wire:model.lazy="input.person.family_count" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">هل يتقاضى راتب</h5>
                        <h6 class="font-semibold text-center">
                            {{ $form->person->salary != '0' ? 'نعم' : 'لا' }}
                        </h6>

                    </div>
                    <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                        <h5 class="mb-3 text-sm">مقداره</h5>
                        <button class="font-semibold text-center" x-show="!open" @click="open = true"> @money($form->person->salary, 'IQD')
                        </button>
                        <ul x-show="open" @click.away="open = false">
                            <input type="text" wire:model.lazy="input.person.salary" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        </ul>
                    </div>
                </div>
            </div>
            {{-- SIX SECTION --}}
            <div class="mt-4 border rounded">
                <h5 class="p-3 text-lg">اسماء افراد العائلة</h5>
                <div class="grid lg:grid-cols-1 md:grid-cols-2 sm:grid-cols-1">
                    @if (isset($form['family_members']))
                    @forelse ($form ['family_members'] as $index => $member)
                    <x-ui.card shadow=false :title="'#' . $loop->index + 1 . ' ' . $member->name">
                        <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2 ">
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">الاسم</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">
                                    {{ $member->name }} </button>
                                <ul x-show="open" @click.away="open = false">
                                    <input type="text" wire:model.lazy="input.family_members.{{ $index }}.name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                </ul>
                            </div>
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">الصلة</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">{{ $member->kinship_name }}</button>
                                <ul x-show="open" @click.away="open = false">
                                    <select wire:model.lazy="input.family_members.{{ $index }}.kinship" class="bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                        <option value="1" selected>اب</option>
                                        <option value="2">ام</option>
                                        <option value="3">ابن</option>
                                        <option value="4">جد</option>
                                        <option value="5">جدة</option>
                                        <option value="6">اخ</option>
                                        <option value="7">اخت</option>
                                        <option value="8">حفيد</option>
                                    </select>
                                </ul>
                            </div>
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">التولد</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">
                                    {{ $member->birthday }} </button>
                                <ul x-show="open" @click.away="open = false">
                                    <input type="text" wire:model.lazy="input.family_members.{{ $index }}.birthday" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                </ul>
                            </div>
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">النسب</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">
                                    {{ $member->is_mr_name }} </button>
                                <ul x-show="open" @click.away="open = false">
                                    <select wire:model.lazy="input.family_members.{{ $index }}.is_mr" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8 ">
                                        <option value="1" selected>سيد</option>
                                        <option value="2">عامي</option>
                                    </select>
                                </ul>
                            </div>
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">المهنة</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">
                                    {{ $member->job }} </button>
                                <ul x-show="open" @click.away="open = false">
                                    <input type="text" wire:model.lazy="input.family_members.{{ $index }}.job" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                </ul>
                            </div>
                            <div class="p-3 m-2 text-center border rounded bg-gray-50 " x-cloak x-data="{ open: false }">
                                <h5 class="mb-3 text-sm">الحالة الصحية</h5>
                                <button class="font-semibold text-center" x-show="!open" @click="open = true">
                                    {{ $member->health_state }} </button>
                                <ul x-show="open" @click.away="open = false">
                                    <input type="text" wire:model.lazy="input.family_members.{{ $index }}.health_state" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                </ul>
                            </div>
                        </div>
                    </x-ui.card>
                    @empty
                    <h2>لا يوجد بيانات</h2>
                    @endforelse
                    @endif
                </div>
            </div>
        </x-ui.card>
    </x-ui.card>
</div>
