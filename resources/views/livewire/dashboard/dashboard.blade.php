<div>
    <div class="border-3 bg-slate-200 rounded-2xl py-4 px-4">
        <h1 class="text-2xl mb-4 mr-2 font-semibold">احصائيات عامة</h1>
        <div class="flex flex-row ">
            <div class="basis-1/3 ml-3 bg-gray-100  rounded-2xl py-4 px-4">
                <div class="rounded-full">
                    <div class="flex flex-col py-1 text-center ">
                        <span class="text-black-500 font-semibold text-lg">الاستمارات</span>
                        <span class="text-black-500">{{$total_form}}</span>
                    </div>
                </div>
            </div>
            <div class="basis-1/3 ml-3 bg-gray-100  rounded-2xl py-4 px-4">
                <div>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذا الشهر)</small></span>
                        <span class="text-black-500">{{$total_form_month}}</span>
                    </div>
                </div>
            </div>
            <div class="basis-1/3 bg-gray-100  rounded-2xl py-4 px-4">
                <div>
                    <div class="flex flex-col py-1 text-center">
                        <span class="text-black-400 text-lg font-semibold">عدد الاستمارات<small>(لهذه السنة)</small></span>
                        <span class="text-black-500">{{$total_form_year}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @admin
    <div>
        <div class="border-3 bg-slate-200 rounded-2xl py-4 px-4">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-2xl mb-4 mr-2 font-semibold">احصائيات المناطق</h1>
                    <div class="flex flex-row ">
                        <div class="basis-1/3 ml-3 bg-gray-100  rounded-2xl py-4 px-4">
                            <div class="rounded-full">
                                <div class="flex flex-col py-1 text-center ">
                                    <span class="text-black-500 font-semibold text-lg">الاستمارات</span>
                                    <span class="text-black-500">{{$total_form}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <h1 class="text-2xl mb-4 mr-2 font-semibold">احصائيات المخولون</h1>
                    <div class="flex flex-row ">
                        <div class="w-full ml-3 bg-gray-100  rounded-2xl py-4 px-4">
                            <div class=" w-full">
                                <table class="table w-full">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الاستمارات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ( $users as $user )
                                        <tr>
                                            <th>
                                                <div class="flex items-center space-x-3">
                                                    <div>
                                                        <a class="font-bold btn-link">
                                                            {{$user->name}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                                {{$user->forms->count()}}
                                            </td>
                                        </tr>
                                        @empty
                                            لايود على احصائيات
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endadmin
</div>
