@section('title', 'اضافة استمارة')
<div>
    <x-ui.card class="bg-white">
        <form x-data="{ formStep: 1 ,  width: '10' }" x-init="width=10" wire:submit.prevent="save">

            <!-- Start Progress Bar -->
            <div class="max-w-full mb-4">
                <div class="h-4 mt-5 rounded bg-gray-50" role="progressbar" :aria-valuenow="width" aria-valuemin="0" aria-valuemax="100">
                    <div class="h-4 text-sm text-center bg-green-400 rounded" :style="`width: ${width}%; transition: width 2s;`">
                    </div>
                </div>
            </div>
            <!-- End Progress Bar -->

            <!-- FIRST STEP -->
            <div x-show="formStep === 1" class="space-y-4">
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">معلومات رب الاسرة</span>
                </div>
                <div class="p-2 mt-1">
                    <div class="grid lg:grid-cols-2">
                        <div class="p-3 m-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر مستوى الفقر</label>
                            <select wire:model.defer="form.person.level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                <option selected>مسوى الفقر</option>
                                <option value="1">B1</option>
                                <option value="2">B2</option>
                                <option value="3">B3</option>
                                <option value="4">B4</option>
                            </select>
                            @error('form.person.level') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-3 m-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر مستوى الفقر</label>
                            <select wire:model.defer="form.city.id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                <option selected>المنطقة</option>
                                @forelse ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @empty
                                <option>لايوجد</option>
                                @endforelse
                            </select>
                            @error('form.city.id') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1">
                        <div class="p-3 m-2 ">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم رب الاسرة</label>
                            <input wire:model.defer="form.head_family.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                            @error('form.head_family.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-3 m-2 grid lg:grid-cols-2 sm:grid-cols-1">
                            <div class="mb-5 lg:ml-3 ">
                                <label class="block mb-2 text-sm  font-medium text-gray-900 ">اختر النسب</label>
                                <select wire:model.defer="form.head_family.is_mr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                    <option selected>النسب</option>
                                    <option value="1">سيد</option>
                                    <option value="2">عامي</option>
                                </select>
                                @error('form.head_family.is_mr') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الحالة</label>
                                <select wire:model.defer="form.head_family.is_alive" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                    <option selected>الحالة</option>
                                    <option value="1">متوفي</option>
                                    <option value="2">حي</option>
                                </select>
                                @error('form.head_family.is_alive') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-5 lg:grid-cols-2 sm:grid-cols-1">
                        <div>
                            <div class="p-3 m-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عمل رب الاسرة</label>
                                <input wire:model.defer="form.head_family.job" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العمل">
                                @error('form.head_family.job') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <div class="p-3 m-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">مقدار الدخل الشهري</label>
                                <input wire:model.defer="form.head_family.salary" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل المقدار">
                                @error('form.head_family.salary') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2 sm:grid-cols-1">
                        <div class="p-3 m-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">هل يتقاضى راتب ؟</label>
                            <select wire:model.defer="form.person.salary_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                <option selected>نوع الراتب</option>
                                <option value="1">تقاعد</option>
                                <option value="2">رعاية</option>
                                <option value="3">مؤسسة</option>
                                <option value="4">مساعدات</option>
                                <option value="5">حكومي</option>
                            </select>
                            @error('form.person.salary_type') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-3 m-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">مقدار الراتب</label>
                            <input wire:model.defer="form.person.salary" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="مقدار الدخل">
                            @error('form.person.salary') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <div class="p-3 m-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">رقم الهاتف</label>
                            <input wire:model.defer="form.person.father_phonenumber" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الرقم">
                            @error('form.person.father_phonenumber') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END FIRST STEP -->

            <!-- SECOND STEP -->
            <div x-show="formStep === 2" class="space-y-4">
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">معلومات الزوجة</span>
                </div>
                <div class="grid gap-5 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم الزوجة</label>
                        <input wire:model.defer="form.wife.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                        @error('form.wife.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر النسب</label>
                        <select wire:model.defer="form.wife.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                            <option selected>النسب</option>
                            <option value="1">علوية</option>
                            <option value="2">عامية</option>
                        </select>
                        @error('form.wife.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">رقم هاتف الام</label>
                        <input wire:model.defer="form.person.mother_phonenumber" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الرقم">
                        @error('form.person.mother_phonenumber') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الحالة</label>
                        <select wire:model.defer="form.wife.state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                            <option selected>الحالة</option>
                            <option value="1">حي</option>
                            <option value="2">متوفية</option>
                            <option value="3">مطلقة</option>
                            <option value="4">أرملة</option>
                        </select>
                        @error('form.wife.state') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END SECOND STEP -->

            <!-- THIRD STEP -->
            <div x-show="formStep === 3" class="space-y-4">
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">معلومات السكن</span>
                </div>
                <div class="grid gap-2 px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عنوان السكن</label>
                        <input wire:model.defer="form.person.location" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العنوان ">
                        @error('form.person.location') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اقرب نقطة دالة</label>
                        <input wire:model.defer="form.person.point" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل اقرب نقطة دالة ">
                        @error('form.person.point') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر نوع السكن</label>
                        <select wire:model="form.person.location_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                            <option selected>نوع السكن</option>
                            <option value="1">ملك</option>
                            <option value="2">تجاوز</option>
                            <option value="3">ايجار</option>
                            <option value="4">زراعي</option>
                        </select>
                        @error('form.person.location_type') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                    </div>

                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الايجار</label>
                        <input @if ($form['person']['location_type'] !=3) disabled @endif wire:model.defer="form.person.rent" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل اقرب ">
                    </div>

                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END THIRD STEP -->

            <!-- LAST STEP -->
            <div x-show="formStep === 4" class="space-y-4">
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">معلومات افراد العائلة</span>
                </div>
                <div class="grid gap-10 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عمل افراد الاسرة</label>
                        <input wire:model.defer="form.person.family_work" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العمل">
                        @error('form.person.family_work') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عددهم</label>
                        <input wire:model.lazy="form.person.family_count" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العدد">
                        @error('form.person.family_count') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="p-5 border rounded-lg bg-gray-50-lg">
                    <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                        <span class="text-center">اسماء افراد العائلة</span>
                    </div>
                    <div class="mt-3" wire:ignore.self>
                        @if (isset($form['family_members']))
                        @foreach ($form['family_members'] as $index => $member)
                        <div :key="$index.now()" class="p-5 mt-3 border rounded-lg bg-gray-50-lg">
                            <span>معلومات الفرد {{$index+1}}</span>
                            <div class="grid gap-3 mt-3 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم الأفراد</label>
                                    <input wire:model.defer="form.family_members.*.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                                    @error('form.family_members.*.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الجنس</label>
                                    <select wire:model.defer="form.family_members.*.gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                        <option selected>الجنس</option>
                                        <option value="1">ذكر</option>
                                        <option value="2">انثى</option>
                                    </select>
                                    @error('form.family_members.*.gender') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الصلة</label>
                                    <select wire:model.defer="form.family_members.*.kinship" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                        <option selected>نوع الصلة</option>
                                        <option value="1">اب</option>
                                        <option value="2">ام</option>
                                        <option value="3">ابن</option>
                                        <option value="4">جد</option>
                                        <option value="5">جدة</option>
                                        <option value="6">اخ</option>
                                        <option value="7">اخت</option>
                                        <option value="8">حفيد</option>
                                    </select>
                                    @error('form.family_members.*.kinship') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <div class="relative">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">تاريخ التولد</label>
                                        <input wire:model.defer="form.family_members.*.birthday"  value="{{date('Y-m-d')}}" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                                        @error('form.family_members.*.birthday') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">المهنة</label>
                                    <input wire:model.defer="form.family_members.{{ $index }}.job" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل المهنة">
                                    @error('form.family_members.*.job') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر النسب</label>
                                    <select wire:model.defer="form.family_members.{{ $index }}.is_mr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                        <option value="1">سيد</option>
                                        <option value="2">عامي</option>
                                    </select>
                                    @error('form.family_members.*.is_mr') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الحالة الصحية</label>
                                    <input wire:model.defer="form.family_members.{{ $index }}.health_state" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الحالة الصحية">
                                    @error('form.family_members.*.health_state') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">الملاحظات</label>
                                    <textarea wire:model.defer="form.family_members.{{ $index }}.note" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الملاحظات"></textarea>
                                    @error('form.family_members.*.note') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <!--  Buttons -->
                <x-ui.button />
            </div>
            <!-- END LAST STEP -->
        </form>
    </x-ui.card>
</div>
