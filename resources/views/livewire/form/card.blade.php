<div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
     <x-card shadow=false title="التنومة">
        <x-slot name="action">
            <x-dropdown>
                <x-dropdown.item icon="document-text" label="استعراض" />
                <x-dropdown.item icon="x" label="حذف" />
            </x-dropdown>
        </x-slot>
        <x-slot name="footer">
            <div class="flex justify-between text-xs">
                <span class="px-2 py-1 rounded">1 Hour</span>
                @if (true)
                <span class="px-2 py-1 text-green-600 bg-green-100 rounded">تمت مراجعتها</span>
                @else
                <span class="px-2 py-1 text-red-600 bg-red-100 rounded">لم تتم المراجعة</span>
                @endif
            </div>
            {{-- <div class="flex items-center justify-between">
                <x-button negative icon="x" label="حذف" />
                <x-button primary icon="view-grid-add" label="استعراض" href="{{route('show')}}" />
            </div> --}}
        </x-slot>
        <!-- Card Content -->
        <div class="">
            <div class="flex flex-col">
                <div class="mt-1" x-data="{ activeTab: 'first' }" x-init="activeTab = window.location.hash ? window.location.hash.replace('#', '') : 'first'">
                    <nav>
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

                    <div class="p-2 mt-1 border rounded">
                        <div x-show="activeTab === 'first'">
                            <div class="flex items-center justify-between p-2 text-sm rounded bg-slate-50">
                                <div>
                                    <span class="text-sm text-slate-500">#12689</span>
                                    <span class="font-semibold text-slate-600 text-md">{{$form->head_family->name}}  </span>
                                </div>
                                <span class="px-2 py-1 font-semibold rounded text-slate-500 bg-slate-100">{{$form->person->level_name}}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->head_family->is_mr_name}}</span>
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->head_family->is_alive}}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->head_family->job}}</span>
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->head_family->salary}}</span>
                            </div>
                            <div class="flex items-center p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-500">الزوجة</span>
                                <span class="mr-2 font-semibold text-slate-600 text-md"> {{$form->wife->name}} </span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->wife->is_mis_name}}</span>
                                <span class="py-1 text-sm rounded bg-slate-50">{{$form->head_family->is_alive}}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="mr-2 text-slate-600 text-md">رقم هاتف الأب</span>
                                <span class="text-sm text-slate-500">{{$form->person->father_phonenumber}}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="mr-2 text-slate-600 text-md">رقم هاتف الأم</span>
                                <span class="text-sm text-slate-500">{{$form->person->mother_phonenumber}}</span>
                            </div>
                        </div>

                        <div x-show="activeTab === 'second'">
                            <div class="flex items-center p-2 text-sm rounded bg-slate-50">
                                <span class="text-slate-600 text-md">{{$form->person->location}}</span>
                            </div>
                            <div class="flex items-center p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-500">قرب</span>
                                <span class="mr-2 text-slate-600 text-md">{{$form->person->point}}</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-600">{{$form->person->location_name}}</span>
                                <span class="text-slate-600 text-md">{{$form->person->rent}}</span>
                            </div>
                        </div>

                        <div x-show="activeTab === 'third'">
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-600">{{$form->person->family_count}} أفراد</span>
                                <span class="text-slate-600 text-md">يعملون في {{$form->person->family_work}}</span>
                            </div>
                            @forelse ($form->family_members as $family_member) 
                            <div class="flex flex-col p-2 mt-1 text-sm rounded bg-slate-50">
                                <div class="flex justify-between mb-1">
                                    <div>
                                        <span class="px-2 rounded bg-slate-100">1</span>
                                    <span class="text-sm font-semibold text-slate-600"> {{$family_member->name}} </span>
                                    </div>
                                    <div>
                                        <span class="px-2 rounded text-slate-600 bg-slate-100"">{{$family_member->kinship_name}} </span>
                                        <span class="px-2 rounded text-slate-600 bg-slate-100"">{{$family_member->birthday}}</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                    <span class="py-1 text-sm rounded bg-slate-100">{{$family_member->is_mr_name}}</span>
                                    <span class="py-1 text-sm rounded bg-slate-100">{{$family_member->is_alive}}</span>
                                </div>
                                <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                    <span class="py-1 text-sm rounded bg-slate-100">{{$family_member->job}}</span>
                                    <span class="py-1 text-sm rounded bg-slate-100">{{$family_member->health_state}}</span>
                                </div>
                            </div>
                            @empty
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-600">لا يوجد أفراد</span>
                            @endforelse

                            {{-- End Foreach members --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </x-card>

</div>
