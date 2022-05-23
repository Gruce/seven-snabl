<div>
    <x-card class="border-1">
        <h1 class="text-2xl mb-4 mr-2 font-semibold">احصائيات عامة</h1>
        <div class="flex flex-row ">
            <div class="basis-1/3 ml-3">
                <x-card class="rounded-full">
                    <div class="flex flex-col py-1 text-center ">
                        <span class="text-black-500 font-semibold text-lg">الاستمارات</span>
                        <span class="text-black-500">{{$total_form}}</span>
                    </div>
                </x-card>
            </div>
            <div class="basis-1/3 ml-3">
                <x-card>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذا الشهر)</small></span>
                        <span class="text-black-500">{{$total_form_month}}</span>
                    </div>
                </x-card>
            </div>
            <div class="basis-1/3">
                <x-card>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذه السنة)</small></span>
                        <span class="text-black-500">{{$total_form_year}}</span>
                    </div>
                </x-card>
            </div>
        </div>
    </x-card>
</div>
