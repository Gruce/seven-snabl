<div>
    <div class="max-w-lg  bg-white rounded-lg border border-gray-200  dark:bg-gray-800 dark:border-gray-700">
        {{-- HEADER --}}
        <div class="flex justify-between px-4 pt-4">
            <span class="px-2 py-1 rounded text-slate-500">
                #{{$form->id}} - {{$form->city->name}}
            </span>
            <div>
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="hidden sm:inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                        </path>
                    </svg>
                </button>

                <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(614px, 2991px);">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <a href="{{ route('show', ['id' => $form->id]) }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">استعراض</a>
                        </li>
                        <li>
                            <a href="#" wire:click="$emit('getFormId', '{{ $form->id }}')" data-modal-toggle="give-modal" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                تقديم هبة</a>
                        </li>
                        <li>
                            <a href="#" wire:click="confirmed({{$form->id}})" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">حذف</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- CARD CONTENT --}}
        <div class="m-3" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
            <nav class="mb-1">
                <ul class="flex">
                    <li class="ml-1 grow">
                        <button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#first" icon="user">اساسيات</button>
                        <button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full rounded bg-blue-300 text-gray-100 p-1" href="#first" icon="user">اساسيات</button>
                    </li>
                    <li class="ml-1 grow">
                        <button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#second" icon="location-marker">السكن</button>
                        <button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full rounded bg-blue-300 text-gray-100 p-1" href="#second" icon="location-marker">السكن</button>
                    </li>
                    <li class="grow">
                        <button x-show="activeTab === 'third'" @click="activeTab = 'third'" class="w-full rounded bg-blue-400 text-gray-800 p-1" slate outline href="#third" icon="user-group">العائلة</button>
                        <button x-show="activeTab != 'third'" @click="activeTab = 'third'" class="w-full rounded bg-blue-300 text-gray-100 p-1" href="#third" icon="user-group">العائلة</button>
                    </li>
                </ul>
            </nav>
            {{-- FIRST TAB - BASICS --}}
            <div x-show="activeTab === 'first'">
                {{-- Head of Family --}}
                <div class="p-1 border rounded">
                    <span class="mr-1 text-2xs text-slate-400">معلومات رب الأسرة</span>
                    <div class="flex items-center justify-between p-1 text-sm">
                        <span class="font-semibold text-slate-500 text-md">{{ $form->head_family->name??'غير محدد' }}</span>
                        </span>
                        <span class="px-2 py-1 font-semibold rounded text-slate-500 bg-slate-50">{{ $form->person->level_name }}</span>
                    </div>
                    <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">النسب</span>
                            <span class="text-slate-500">{{ $form->head_family->is_mr_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">الحالة</span>
                            <span class="text-slate-500">{{ $form->head_family->is_alive_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">العمل</span>
                            <span class="text-slate-500">{{ $form->head_family->job }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">الدخل الشهري</span>
                            <span class="text-slate-500">@money($form->head_family->salary ?? 0, 'IQD')</span>
                        </div>
                    </div>
                </div>

                {{-- Wife --}}
                <div class="p-1 mt-1 border rounded">
                    <span class="mr-1 text-2xs text-slate-400">معلومات الزوجة</span>
                    <div class="flex items-center p-1 text-sm">
                        <span class="font-semibold text-slate-500 text-md">{{ $form->wife->name }} </span>
                    </div>
                    <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">النسب</span>
                            <span class="text-slate-500">{{ $form->wife->is_mis_name }}</span>
                        </div>
                        <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                            <span class="text-slate-400 text-2xs">الحالة</span>
                            <span class="text-slate-500">{{ $form->wife->wife_state }}</span>
                        </div>
                    </div>
                </div>

                {{-- Phone numbers --}}
                <div class="grid grid-cols-2 gap-1 my-1 text-center">
                    <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                        <span class="text-slate-400 text-2xs">رقم هاتف الأب</span>
                        <span class="text-slate-500">{{ $form->person->father_phonenumber }}</span>
                    </div>
                    <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                        <span class="text-slate-400 text-2xs">رقم هاتف الأم</span>
                        <span class="text-slate-500">{{ $form->person->mother_phonenumber }}</span>
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
                    <button type="button" x-show="max > count" @click="count++" xs @click="count--" class="px-3 py-2 text-xs font-medium text-center text-black bg-gray-200 rounded-lg  focus:outline-none focus:ring-blue-300">
                        <i class="fa-solid fa-arrow-left"></i>
                        التالي
                    </button>
                    <button type="button" x-show="max > 1 && count != 1" xs @click="count--" class="px-3 py-2 text-xs font-medium text-center text-black bg-gray-200 rounded-lg  focus:outline-none focus:ring-blue-300 ">
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
        </div>
        {{-- FOOTER --}}
        <div class="flex justify-between text-xs m-3">
            <div class="flex flex-col items-center justify-center gap-1">
                <i class="fa-solid fa-clock text-slate-400"></i>
                <span class="px-2 py-1 rounded text-slate-500">
                    {{ $form->updated_at->diffForHumans() }}
                </span>
            </div>

            <div class="flex flex-col items-center justify-center gap-1">
                @if ($form->review == 1)
                <i class="fa-solid fa-check text-green-500"></i>
                <span class="px-2 py-1 text-slate-500">تمت مراجعتها</span>
                @else
                <i class="fa-solid fa-x text-red-500"></i>
                <span class="px-2 py-1 text-slate-500">لم تتم المراجعة</span>
                @endif
            </div>
        </div>
    </div>
</div>
