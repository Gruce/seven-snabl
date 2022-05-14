<div>
    <x-card>
        <div class="flex  ">
            <div class=" basis-1/3">
                <h1 class="text-lg font-bold">
                    مجمع سبع سنابل الطبي الخيري
                </h1>
                <span class="px-7">
                    لجنة الرعاية الاجتماعية
                </span>
            </div>
            <div class="flex justify-center basis-1/3 ">
                <img width="100" height="100" src="{{ asset('img/a.png') }}">
            </div>
            <div class="  basis-1/3">
                <div class="flex gap-2 flex-row justify-end ">
                    <div class="text-sm"> تاريخ التنظيم</div>
                    <span class="text-sm">2022/5/13</span>
                </div>
                <div class="flex gap-2 flex-row justify-end">
                    <div class="text-sm"> رقم الاستمارة </div>
                    <div class="text-sm">2022/5/13</div>
                </div>
                <div class="flex gap-2 flex-row justify-end">
                    <div class="text-sm"> رمز المنطقة</div>
                    <div class="text-sm">565656</div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-lg text-center font-semibold">
                استمارة كشف العوائل المتعففة
            </h1>
        </div>
        <br>
        <div>
            <h1 class="text-sm text-center font-semibold ">
                المعلومات الشخصية
            </h1>
        </div>
        <x-card shadow=false class=" border-transparent">
            <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
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
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{ $form->person->level_name }}</button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.level" type="text">
                                    </ul>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{ $form->head_family->name }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.head_family.name" type="text">
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->is_mr_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.head_family.is_mr" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->is_alive }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.head_family.is_alive" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->job }} </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.head_family.job" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->head_family->salary }}
                                    </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.head_family.salary" type="text">
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
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

                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->name }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->is_mis_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.is_mis" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->wife->is_alive }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.state" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->father_phonenumber }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.father_phonenumber" type="text">
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->mother_phonenumber }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.mother_phonenumber" type="text">
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
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
                        <tr class="bg-white border-b  ">
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->location }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.location" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->point }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.point" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->location_name }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.location_type" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->location_name == 'ايجار' ? $form->person->rent : 'لايوجد' }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.rent" type="text">
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
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
                        <tr class="bg-white border-b  ">
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->family_work }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.family_work" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->family_count }}
                                    </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.family_count" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">
                                        {{ $form->person->salary != '0' ? 'نعم' : 'لا' }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.have_salary" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{ $form->person->salary }} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.person.salary" type="text">
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-10 text-center font-semibold">
                <h1>
                    اسماء افراد العائلة
                </h1>
            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
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
                        @forelse ($form->family_members as $member)
                        <tr class="bg-white border-b  ">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>

                            <td x-data="{ open: false }" class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->name}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true">{{$member->kinship_name}}</button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->birthday}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->is_mr_name}} </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->job}} </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button x-show="!open" @click="open = true"> {{$member->health_state}}  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input wire:model="form.wife.name" type="text">
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
                <textarea class="w-full" name="" id="" cols="10" rows="3" placeholder="الملاحظات"></textarea>
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
        </x-card>
    </x-card>
</div>
