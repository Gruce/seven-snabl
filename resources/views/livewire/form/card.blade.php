<div class="grid gap-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
    <x-card shadow=false :title="'#'. $form->id. ' ' .$form->city->name">
        <x-slot  name="action">
            <x-dropdown>
                <x-dropdown.item href="{{route('show', [ 'id'=> $form->id]) }}" icon="document-text" label="استعراض" />
                <x-dropdown.item @click="$openModal('cardModal-{{$form->id}}')" icon="document-text" label="تقديم هبه" />
                <x-dropdown.item icon="x" label="حذف" />
            </x-dropdown>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-between text-xs">
                <div class="flex flex-col items-center justify-center gap-1">
                    <x-icon name="clock" class="w-4 h-4 text-slate-400" />
                    <span class="px-2 py-1 rounded text-slate-500">
                        {{$form->updated_at->diffForHumans()}}
                    </span>
                </div>

                <div class="flex flex-col items-center justify-center gap-1">
                    @if ($form->review)
                        <x-icon name="check" class="w-4 h-4 text-green-500" />
                        <span class="px-2 py-1 text-slate-500">تمت مراجعتها</span>
                    @else
                        <x-icon name="x" class="w-4 h-4 text-red-500" />
                        <span class="px-2 py-1 text-slate-500">لم تتم المراجعة</span>
                    @endif
                </div>
            </div>
        </x-slot>
        <!-- Card Content -->
        <div>
            <div class="flex flex-col">
                <div x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
                    <nav class="mb-1">
                        <ul class="flex">
                            <li class="ml-1 grow">
                                <x-button x-show="activeTab === 'first'" @click="activeTab = 'first'" class="w-full" slate outline href="#first" icon="user" label="اساسيات" />
                                <x-button x-show="activeTab != 'first'" @click="activeTab = 'first'" class="w-full" href="#first" icon="user" label="اساسيات" />
                            </li>
                            <li class="ml-1 grow">
                                <x-button x-show="activeTab === 'second'" @click="activeTab = 'second'" class="w-full" slate outline href="#second" icon="location-marker" label="السكن" />
                                <x-button x-show="activeTab != 'second'" @click="activeTab = 'second'" class="w-full" href="#second" icon="location-marker" label="السكن" />
                            </li>
                            <li class="grow">
                                <x-button x-show="activeTab === 'third'" @click="activeTab = 'third'" class="w-full" slate outline href="#third" icon="user-group" label="العائلة" />
                                <x-button x-show="activeTab != 'third'" @click="activeTab = 'third'" class="w-full" href="#third" icon="user-group" label="العائلة" />
                            </li>

                        </ul>
                    </nav>
                    {{-- FIRST TAB - BASICS --}}
                    <div x-show="activeTab === 'first'">

                        {{-- Head of Family --}}
                        <div class="p-1 border rounded">
                            <span class="mr-1 text-2xs text-slate-400">معلومات رب الأسرة</span>
                            <div class="flex items-center justify-between p-1 text-sm">
                                <span class="font-semibold text-slate-500 text-md">{{$form->head_family->name}} </span>
                                <span class="px-2 py-1 font-semibold rounded text-slate-500 bg-slate-50">{{$form->person->level_name}}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">النسب</span>
                                    <span class="text-slate-500">{{$form->head_family->is_mr_name}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">الحالة</span>
                                    <span class="text-slate-500">{{$form->head_family->is_alive}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">العمل</span>
                                    <span class="text-slate-500">{{$form->head_family->job}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">الدخل الشهري</span>
                                    <span class="text-slate-500">@money($form->head_family->salary, 'IQD')</span>
                                </div>
                            </div>
                        </div>

                        {{-- Wife --}}
                        <div class="p-1 mt-1 border rounded">
                            <span class="mr-1 text-2xs text-slate-400">معلومات الزوجة</span>
                            <div class="flex items-center p-1 text-sm">
                                <span class="font-semibold text-slate-500 text-md">{{$form->wife->name}} </span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">النسب</span>
                                    <span class="text-slate-500">{{$form->wife->is_mis_name}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">الحالة</span>
                                    <span class="text-slate-500">{{$form->wife->is_alive}}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Phone numbers --}}
                        <div class="grid grid-cols-2 gap-1 my-1 text-center">
                            <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                <span class="text-slate-400 text-2xs">رقم هاتف الأب</span>
                                <span class="text-slate-500">{{$form->person->father_phonenumber}}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                <span class="text-slate-400 text-2xs">رقم هاتف الأم</span>
                                <span class="text-slate-500">{{$form->person->mother_phonenumber}}</span>
                            </div>
                        </div>
                    </div>
                    {{-- END : FIRST TAB --}}

                    {{-- SECOND TAB --}}
                    <div x-show="activeTab === 'second'">
                        <div class="grid grid-cols-2 gap-1 my-1 text-center">
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">العنوان</span>
                                <span class="text-slate-500">{{$form->person->location}}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">أقرب نقطة دالة</span>
                                <span class="text-slate-500">{{$form->person->point}}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">نوع السكن</span>
                                <span class="text-slate-500">{{$form->person->location_name}}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">الإيجار</span>
                                <span class="text-slate-500">@money($form->person->rent, 'IQD')</span>
                            </div>
                        </div>
                    </div>
                    {{-- END : SECOND TAB --}}

                    {{-- THIRD TAB --}}
                    <div x-data="{count: 1, max: $wire.family_count}" x-show="activeTab === 'third'">
                        <div class="grid grid-cols-2 gap-1 my-1 text-center">
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">عدد افراد الأسرة</span>
                                <span class="text-slate-500">{{$form->family_members->count()}}</span>
                            </div>
                            <div class="flex flex-col py-1 text-sm border border-gray-200 rounded">
                                <span class="text-slate-400 text-2xs">العمل</span>
                                <span class="text-slate-500">{{$form->person->family_work}}</span>
                            </div>
                        </div>

                        @if ($family_count > 1)
                        <div class="flex justify-center my-1">
                            <x-button x-show="max > 1 && count != 1" xs label="السابق" icon="arrow-narrow-right" @click="count--" />
                            <x-button x-show="max > count" @click="count++" xs label="التالي" icon="arrow-narrow-left" />
                        </div>
                        @endif

                        @forelse ($form->family_members as $index => $family_member)
                        <div x-show="count == {{$index+1}}" class="p-1 mb-1 border rounded">
                            <span class="mr-1 text-2xs text-slate-400">معلومات الفرد {{$loop->index+1}}</span>
                            <div class="flex items-center justify-between p-1">
                                <span class="text-sm font-semibold text-slate-500">
                                    {{$family_member->name}}
                                    <span class="px-2 text-xs font-normal rounded">( {{$family_member->kinship_name}} )</span>
                                </span>
                                <span class="text-xs text-slate-500">{{$family_member->birthday}}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center">
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">النسب</span>
                                    <span class="text-slate-500">{{$family_member->is_mr_name}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">الحالة</span>
                                    <span class="text-slate-500">{{$family_member->is_alive}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">العمل</span>
                                    <span class="text-slate-500">{{$family_member->job}}</span>
                                </div>
                                <div class="flex flex-col py-1 text-sm border border-gray-100 rounded">
                                    <span class="text-slate-400 text-2xs">الحالة الصحية</span>
                                    <span class="text-slate-500">{{$family_member->health_state}}</span>
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
            </div>
        </div>
    </x-card>
    @livewire('give.add', ['form' => $form])
</div>
