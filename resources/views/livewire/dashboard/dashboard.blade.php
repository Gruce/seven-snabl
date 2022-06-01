<div>
    <div class="border-3 bg-slate-200 rounded-2xl py-4 px-4">
        <h1 class="text-2xl mb-4 mr-2 font-semibold">احصائيات عامة</h1>
        <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
            <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                <div class="rounded-full">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg">الاستمارات</span>
                        <span class="text-black-500">{{$total_form}}</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                <div>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذا الشهر)</small></span>
                        <span class="text-black-500">{{$total_form_month}}</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                <div>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذه السنة)</small></span>
                        <span class="text-black-500">{{$total_form_year}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @admin
    <br>
    <div class="border-3 bg-slate-200 rounded-2xl py-4 px-4">
        <h1 class="text-2xl mb-4 mr-2 font-semibold">تنافسي</h1>
        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
            <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                <h1 class="text-2xl mb-4 mr-2 font-semibold">اكثر المخولون تقديما</h1>
                <div class="rounded-lg border border-gray-600 bg-gray-200">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg">محمد سعد  : 787</span>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-600 mt-3 bg">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg">حبار النباتي :  500 </span>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-600 mt-3">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg">كشمش الحياتي : 245</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                <h1 class="text-2xl mb-4 mr-2 font-semibold">اكثر المدن تقديما</h1>
                <div class="rounded-lg border border-gray-600 bg-gray-200">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg"> التنومة  : 787</span>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-600 mt-3 bg">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg"> الجبيلة :  500 </span>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-600 mt-3">
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-500 font-semibold text-lg"> الطويسة : 245</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endadmin

    {{-- <div class="border-3 bg-slate-200 rounded-2xl py-4 px-4">
        <div>
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                    <div class="rounded-full">
                        <div class="flex flex-col py-1 text-center">
                            <span class="text-black-500 font-semibold text-lg">عدد الكشوفات الكلية</span>
                            <span class="text-black-500">{{$total_form}}</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 m-3 rounded-2xl py-4 px-4">
                    <div>
                        <div class="flex flex-col py-1 text-center">
                            <span class="text-black-400 text-lg font-semibold">عدد الكشوفات<small> (لهذا الشهر) </small></span>
                            <span class="text-black-500">{{$total_form_month}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>
