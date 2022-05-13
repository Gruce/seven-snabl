<div class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 ">
    @for ($i=0 ; $i < 10 ; $i++) <x-card shadow=false title="التنومة">
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
                                    <span class="font-semibold text-slate-600 text-md">جبار علي محمد</span>
                                </div>
                                <span class="px-2 py-1 font-semibold rounded text-slate-500 bg-slate-100">B2</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">سيد</span>
                                <span class="py-1 text-sm rounded bg-slate-50">حي</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">نجار</span>
                                <span class="py-1 text-sm rounded bg-slate-50">300,000 د.ع</span>
                            </div>
                            <div class="flex items-center p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-500">الزوجة</span>
                                <span class="mr-2 font-semibold text-slate-600 text-md">جباره علي محمد</span>
                            </div>
                            <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                <span class="py-1 text-sm rounded bg-slate-50">سيد</span>
                                <span class="py-1 text-sm rounded bg-slate-50">حي</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="mr-2 text-slate-600 text-md">رقم هاتف الأب</span>
                                <span class="text-sm text-slate-500">077123456789</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="mr-2 text-slate-600 text-md">رقم هاتف الأم</span>
                                <span class="text-sm text-slate-500">077123456789</span>
                            </div>
                        </div>

                        <div x-show="activeTab === 'second'">
                            <div class="flex items-center p-2 text-sm rounded bg-slate-50">
                                <span class="text-slate-600 text-md">البصرة، التنومة، شط العرب، حي جاسم ابو الغاز</span>
                            </div>
                            <div class="flex items-center p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-500">قرب</span>
                                <span class="mr-2 text-slate-600 text-md">خالتك الشكره</span>
                            </div>
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-600">تجاوز</span>
                                <span class="text-slate-600 text-md">300,000 د.ع</span>
                            </div>
                        </div>

                        <div x-show="activeTab === 'third'">
                            <div class="flex items-center justify-between p-2 mt-1 text-sm rounded bg-slate-50">
                                <span class="text-sm text-slate-600">5 أفراد</span>
                                <span class="text-slate-600 text-md">يعملون في المستشفى</span>
                            </div>
                            {{-- Foreach members --}}
                            <div class="flex flex-col p-2 mt-1 text-sm rounded bg-slate-50">
                                <div class="flex justify-between mb-1">
                                    <div>
                                        <span class="px-2 rounded bg-slate-100">1</span>
                                        <span class="text-sm font-semibold text-slate-600">جبار علي محمد</span>
                                    </div>
                                    <div>
                                        <span class="px-2 rounded text-slate-600 bg-slate-100"">صلة</span>
                                        <span class="px-2 rounded text-slate-600 bg-slate-100"">1997-11-30</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                    <span class="py-1 text-sm rounded bg-slate-100">سيد</span>
                                    <span class="py-1 text-sm rounded bg-slate-100">حي</span>
                                </div>
                                <div class="grid grid-cols-2 gap-1 mt-1 text-center text-slate-500">
                                    <span class="py-1 text-sm rounded bg-slate-100">المهنة</span>
                                    <span class="py-1 text-sm rounded bg-slate-100">الحالة الصحية</span>
                                </div>
                            </div>
                            {{-- End Foreach members --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </x-card>
        @endfor
</div>
