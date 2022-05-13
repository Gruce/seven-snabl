<div>
    <x-card>
        <div class="flex  justify-between  ">
            <div>
                <h1 class="text-lg font-bold">
                    مجمع سبع سنابل الطبي الخيري
                </h1>
                <span class="px-7">
                    لجنة الرعاية الاجتماعية
                </span>
            </div>
            <div class="text-center">
                <img width="100" height="100" src="{{ asset('img/a.png') }}">
            </div>
            <div>
                <div class="flex gap-2 flex-row  ">
                    <div class="text-sm"> تاريخ التنظيم</div>
                    <span class="text-sm">2022/5/13</span>
                </div>
                <div class="flex gap-2 flex-row">
                    <div class="text-sm"> رقم الاستمارة </div>
                    <div class="text-sm">2022/5/13</div>
                </div>
                <div class="flex gap-2 flex-row">
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
                                    <button @click="open = true"> B   </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> حسن حازم جداوي </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> سيد </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> حي </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> موظف   </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 346   </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
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
                                    <button @click="open = true"> هدى احمد مصطفى </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> سيد  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> حيه  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 07729454553  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>

                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 077159454553  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
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
                                    <button @click="open = true"> التنومة  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> شارع 34  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> ملك  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 0  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
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
                                    <button @click="open = true"> لايوجد  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 4  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> نعم  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> 4435  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
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
                        <tr class="bg-white border-b  ">
                            <td class="px-6 py-4">
                                1
                            </td>

                            <td x-data="{ open: false }" class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> حسن كاظم حميد</button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true">ابن</button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> ابي الخصيب </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> سيد  </button>
                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> عاطل  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div x-data="{ open: false }">
                                    <button @click="open = true"> مريض  </button>

                                    <ul x-show="open" @click.away="open = false">
                                        <input type="text">
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <textarea class="w-full" name="" id="" cols="10" rows="3" placeholder="الملاحظات"></textarea>
            </div>
            <div class="flex flex-row justify-between mt-5">
                <div>
                    <h1>
                        -:اسم المتابع وتوقيعه
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
