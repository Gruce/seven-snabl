@section('title', 'اضافة استمارة')
<div>
    <x-ui.card class="bg-white">
        <form x-cloak x-data="{ formStep: 1 ,  width: '10' }" x-init="width=10" wire:submit.prevent="save">

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
                <div class="lg:p-2 lg:mt-1 sm:m-0 sm:p-0">
                    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ">
                        <div class="mb-3 lg:ml-3 md:ml-3">
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
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر المنطقة</label>
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
                    <div class="grid gap-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                        <div class="mb-3 lg:ml-3 md:ml-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم رب الاسرة</label>
                            <input wire:model.defer="form.head_family.name" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                            @error('form.head_family.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                            <div class="mb-5 lg:ml-3 md:ml-3 ">
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
                    <div class="grid gap-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                        <div class="mb-3 lg:ml-3 md:ml-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عمل رب الاسرة</label>
                            <input wire:model.defer="form.head_family.job" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العمل">
                            @error('form.head_family.job') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">مقدار الدخل الشهري</label>
                            <input wire:model.defer="form.head_family.salary" required type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل المقدار">
                            @error('form.head_family.salary') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid gap-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                        <div class="mb-3 lg:ml-3 md:ml-3">
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
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">مقدار الراتب</label>
                            <input wire:model.defer="form.person.salary" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="مقدار الدخل">
                            @error('form.person.salary') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">رقم الهاتف</label>
                            <input wire:model.defer="form.person.father_phonenumber" required type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الرقم">
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
                <div class="grid gap-2 lg:px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم الزوجة</label>
                        <input wire:model.defer="form.wife.name" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                        @error('form.wife.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر النسب</label>
                        <select wire:model.defer="form.wife.is_mis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                            <option selected>النسب</option>
                            <option value="1">علوية</option>
                            <option value="2">عامية</option>
                        </select>
                        @error('form.wife.is_mis') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">رقم هاتف الام</label>
                        <input wire:model.defer="form.person.mother_phonenumber" required type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الرقم">
                        @error('form.person.mother_phonenumber') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
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
                <div class="grid gap-2 lg:px-5 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عنوان السكن</label>
                        <input wire:model.defer="form.person.location" type="text" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العنوان ">
                        @error('form.person.location') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اقرب نقطة دالة</label>
                        <input wire:model.defer="form.person.point" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل اقرب نقطة دالة ">
                        @error('form.person.point') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
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
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الايجار</label>
                        <input @if ($form['person']['location_type'] !=3) disabled @endif wire:model.defer="form.person.rent" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل اقرب ">
                    </div>
                </div>
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">اضافة ملفات</span>
                </div>
                <div class="flex w-full items-center justify-center bg-grey-lighter">
                    <label class="w-full flex flex-col justify-around items-center px-1 py-3  @if (count($files) > 0) bg-blue-700 text-white @else bg-white text-blue-900  @endif rounded-lg tracking-wide border border-blue-700 cursor-pointer hover:bg-blue-700 hover:text-white">
                        <div wire:loading wire:target="files">
                            <x-ui.loading />
                        </div>
                        <div wire:loading.remove wire:target="files">
                            @if (count($files) > 0)
                            <i class="fa-solid fa-check text-xl"></i>
                            @else
                            <i class="fa-solid fa-upload text-xl"></i>
                            @endif
                        </div>
                        <span class="mt-2 text-sm leading-normal">
                            @if (count($files) > 0)
                            تم اختيار {{ count($files) }} ملف
                            @else
                            لايوجد ملف
                            @endif
                        </span>
                        <input id="file" type='file' class="hidden" wire:model="files" multiple />
                    </label>
                    @error('files')
                    <span class="error text-red-600 bg-red-100 rounded-lg py-1 px-2 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <x-ui.button></x-ui.button>
            </div>
            <!-- END THIRD STEP -->

            <!-- LAST STEP -->
            <div x-show="formStep === 4" class="space-y-4">
                <div class="flex items-center justify-center p-2 rounded-lg bg-gray-50 bg-gray-50-lg">
                    <span class="text-lg">معلومات افراد العائلة</span>
                </div>
                <div class="grid lg:gap-10 gap-3 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عمل افراد الاسرة</label>
                        <input wire:model.defer="form.person.family_work" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العمل">
                        @error('form.person.family_work') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 lg:ml-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">عددهم</label>
                        <input wire:model.lazy="form.person.family_count" required type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل العدد">
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
                                    <input wire:model.defer="form.family_members.{{ $index }}.name" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
                                    @error('form.family_members.*.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الجنس</label>
                                    <select wire:model.defer="form.family_members.{{ $index }}.gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                        <option selected>الجنس</option>
                                        <option value="1">ذكر</option>
                                        <option value="2">انثى</option>
                                    </select>
                                    @error('form.family_members.*.gender') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر الصلة</label>
                                    <select wire:model.defer="form.family_members.{{ $index }}.kinship" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
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
                                        <input wire:model.defer="form.family_members.{{ $index }}.birthday" required type="date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Select date">
                                        @error('form.family_members.*.birthday') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">المهنة</label>
                                    <input wire:model.defer="form.family_members.{{ $index }}.job" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل المهنة">
                                    @error('form.family_members.*.job') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">اختر النسب</label>
                                    <select wire:model.defer="form.family_members.{{ $index }}.is_mr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                                        <option selected>النسب</option>
                                        <option value="1">سيد</option>
                                        <option value="2">عامي</option>
                                    </select>
                                    @error('form.family_members.*.is_mr') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الحالة الصحية</label>
                                    <input wire:model.defer="form.family_members.{{ $index }}.health_state" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الحالة الصحية">
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
