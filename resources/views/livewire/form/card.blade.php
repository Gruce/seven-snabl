<div>
    <div class="max-w-lg bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        {{-- HEADER --}}
        <div x-data="{ openSetting: false}" class="flex flex-col justify-between p-3 pb-0 sm:flex-row">
            <div class="flex justify-between mb-1">
                <span class="px-2 py-1 rounded text-slate-500">
                    #{{$form->id}} - {{$form->city->name}}
                </span>
                <button @click="openSetting=!openSetting" class="px-4 border rounded-lg sm:hidden">
                    <i class="text-gray-400 fas fa-ellipsis-vertical"></i>
                </button>
            </div>
            <div :class="openSetting ? 'flex' : 'hidden sm:flex'" class="justify-between border rounded-lg">
                <a href="{{ route('show', ['form_id' => $form->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">استعراض</a>
                <button @click="() => {addGiven=true; window.scrollTo(0, 0);}" wire:click="$emitTo('give.add', 'getFormId', {{ $form->id }})" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    تقديم هبة</button>
                <button wire:click="confirmed({{$form->id}})" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">حذف</button>

            </div>
        </div>
        {{-- CARD CONTENT --}}
        <div class="m-3" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
            <nav class="flex mb-1 border rounded">
                {{-- x-show="activeTab === 'third'" --}}
                <button @click="activeTab = 'first'" class="p-2 rounded-r grow" :class="(activeTab === 'first') ? 'text-white bg-blue-600' : 'hover:bg-gray-100 text-gray-600'" href="#first">اساسيات</button>
                <button @click="activeTab = 'second'" class="p-2 grow" :class="(activeTab === 'second') ? 'text-white bg-blue-600' : 'hover:bg-gray-100 text-gray-600'" href="#second">السكن</button>
                <button @click="activeTab = 'third'" class="p-2 rounded-l grow" :class="(activeTab === 'third') ? 'text-white bg-blue-600' : 'hover:bg-gray-100 text-gray-600'" href="#third">العائلة</button>
                <button @click="activeTab = 'fourth'" class="p-2 rounded-l grow" :class="(activeTab === 'fourth') ? 'text-white bg-blue-600' : 'hover:bg-gray-100 text-gray-600'" href="#fourth">الهبات</button>
            </nav>
            {{-- FIRST TAB - BASICS --}}
            <div x-show="activeTab === 'first'">
                {{-- Head of Family --}}
                <div class="p-1 border rounded">
                    <div class="flex justify-between">
                        <div class="flex flex-col mr-1">
                            <span class="text-2xs text-slate-400">معلومات رب الأسرة</span>
                            <span class="font-semibold text-slate-500 text-md">{{ $form->head_family->name??'غير محدد' }}</span>
                        </div>
                        <span class="px-4 py-2 text-lg font-semibold rounded text-slate-500 bg-slate-50">{{ $form->person->level_name }}</span>
                    </div>
                    <div class="grid grid-cols-4 gap-1 mt-2 text-center">
                        <div class="flex flex-col py-1 text-sm">
                            <span class="text-slate-400 text-2xs">النسب</span>
                            <span class="font-semibold text-slate-500">{{ $form->head_family->is_mr_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm">
                            <span class="text-slate-400 text-2xs">الحالة</span>
                            <span class="font-semibold text-slate-500">{{ $form->head_family->is_alive_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm">
                            <span class="text-slate-400 text-2xs">العمل</span>
                            <span class="font-semibold text-slate-500">{{ $form->head_family->job }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm">
                            <span class="text-slate-400 text-2xs">الدخل الشهري</span>
                            <span class="font-semibold text-slate-500">@money($form->head_family->salary ?? 0, 'IQD')</span>
                        </div>
                    </div>
                </div>

                {{-- Wife --}}
                <div class="p-1 mt-1 border rounded">
                    <div class="flex justify-between">
                        <div class="w-1/2 basis-1/2">
                            <span class="mr-1 text-2xs text-slate-400">معلومات الزوجة</span>
                            <div class="flex items-center p-1 text-sm">
                                <span class="font-semibold text-slate-500 text-md">{{ $form->wife->name }} </span>
                            </div>
                        </div>
                        <div class="grid w-1/2 grid-cols-2 gap-1 mt-1 text-center basis-1/2">
                            <div class="flex flex-col py-1 text-sm">
                                <span class="text-slate-400 text-2xs">النسب</span>
                                <span class="font-semibold text-slate-500">{{ $form->wife->is_mis_name }}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm">
                                <span class="text-slate-400 text-2xs">الحالة</span>
                                <span class="font-semibold text-slate-500">{{ $form->wife->wife_state }}</span>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- Phone numbers --}}
                <div class="grid grid-cols-2 gap-1 my-1 text-center">
                    <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                        <span class="text-slate-400 text-2xs">رقم هاتف الأب</span>
                        <span class="font-semibold text-slate-500">{{ $form->person->father_phonenumber }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                        <span class="text-slate-400 text-2xs">رقم هاتف الأم</span>
                        <span class="font-semibold text-slate-500">{{ $form->person->mother_phonenumber }}</span>
                    </div>
                </div>
            </div>
            {{-- END : FIRST TAB --}}

            {{-- SECOND TAB --}}
            <div x-show="activeTab === 'second'">
                <div class="grid grid-cols-2 gap-1 my-1 text-center">
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">العنوان</span>
                        <span class="text-slate-500">{{ $form->person->location }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">أقرب نقطة دالة</span>
                        <span class="text-slate-500">{{ $form->person->point }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">نوع السكن</span>
                        <span class="text-slate-500">{{ $form->person->location_name }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">الإيجار</span>
                        <span class="text-slate-500">@money($form->person->rent ?? 0, 'IQD')</span>
                    </div>
                </div>
            </div>
            {{-- END : SECOND TAB --}}

            {{-- THIRD TAB --}}
            <div x-data="{ count: 1, max: $wire.family_count }" x-show="activeTab === 'third'">
                <div class="grid grid-cols-2 gap-1 my-1 text-center">
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">عدد افراد الأسرة</span>
                        <span class="text-slate-500">{{ $form->family_members->count() }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                        <span class="text-slate-400 text-2xs">العمل</span>
                        <span class="text-slate-500">{{ $form->person->family_work }}</span>
                    </div>
                </div>

                @if ($family_count > 1)
                <div class="flex justify-center my-1">
                    <button type="button" x-show="max > count" @click="count++" xs @click="count--" class="px-3 py-2 text-xs font-medium text-center text-black bg-gray-100 rounded-lg focus:outline-none focus:ring-blue-300">
                        <i class="fa-solid fa-arrow-left"></i>
                        التالي
                    </button>
                    <button type="button" x-show="max > 1 && count != 1" xs @click="count--" class="px-3 py-2 text-xs font-medium text-center text-black bg-gray-100 rounded-lg focus:outline-none focus:ring-blue-300 ">
                        <i class="fa-solid fa-arrow-right"></i>
                        السابق
                    </button>
                </div>
                @endif

                @forelse ($form->family_members as $index => $family_member)
                <div x-show="count == {{ $index + 1 }}" class="p-1 mb-1 border rounded">
                    <span class="mr-1 text-2xs text-slate-400">معلومات الفرد {{ $loop->index + 1 }}</span>
                    <div class="flex items-center justify-between p-1">
                        <span class="text-sm font-semibold text-slate-500">
                            {{ $family_member->name }}
                            <span class="px-2 text-xs font-normal rounded">(
                                {{ $family_member->kinship_name }} )</span>
                        </span>
                        <span class="text-xs text-slate-500">{{ $family_member->birthday }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">النسب</span>
                            <span class="text-slate-500">{{ $family_member->is_mr_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">الحالة</span>
                            <span class="text-slate-500">{{ $family_member->health_state }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">العمل</span>
                            <span class="text-slate-500">{{ $family_member->job }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">الحالة الصحية</span>
                            <span class="text-slate-500">{{ $family_member->health_state }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                    <span class="text-sm text-slate-600">لا يوجد أفراد</span>
                </div>
                @endforelse
                {{-- End Foreach members --}}
            </div>
            {{-- END : THIRD TAB --}}

            {{-- FOURTH TAB --}}
            <div x-show="activeTab === 'fourth'">
                <div class="grid grid-rows-1 gap-1 my-1 text-center">
                    <div class="relative overflow-x-auto  sm:rounded-lg">
                        <table class="w-full h-3 text-sm text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        وصف الهبة
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        نوع الهبة
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($form->gives as $give)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $loop->iteration	 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $give->note }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $give->give_type->name }}
                                    </td>
                                </tr>
                                @empty
                                <div class="flex items-center justify-center p-1">
                                    <span class="text-sm font-semibold text-slate-500">
                                        لا يوجد هبات
                                    </span>
                                </div>
                                @endforelse
                                @if ($form->gives->count() >= 3)
                                    <tr class="px-6 py-4">
                                        <td colspan="3" class="text-center">
                                            <a href="{{ route('show.gives', ['form_id' => $form->id]) }}" class="  text-sm text-blue-500 hover:bg-blue-200 ">
                                                عرض المزيد
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- End Foreach members --}}
            </div>
            {{-- END : FOURTH TAB --}}
        </div>
        {{-- FOOTER --}}
        <div class="flex justify-between m-3 text-xs">
            <div class="flex flex-col items-center justify-center gap-1">
                <i class="fa-solid fa-clock text-slate-400"></i>
                <span class="px-2 py-1 rounded text-slate-500">
                    {{ $form->updated_at->diffForHumans() }}
                </span>
            </div>

            <div class="flex flex-col items-center justify-center gap-1">
                @if ($form->review == 1)
                <i class="text-green-500 fa-solid fa-check"></i>
                <span class="px-2 py-1 text-slate-500">تمت مراجعتها</span>
                @else
                <i class="text-red-500 fa-solid fa-x"></i>
                <span class="px-2 py-1 text-slate-500">لم تتم المراجعة</span>
                @endif
            </div>
        </div>
    </div>
</div>
