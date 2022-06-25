@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false, filter: false, addGiven: false }">
        <div class="grid gap-2 p-2 mb-3 rounded-lg lg:grid-cols-2 sm:grid-cols-1 bg-slate-50">
            {{-- ADD --}}

            <div class="flex justify-between ">
                <button class="block w-20 md:w-auto  text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="form-modal">
                    اضافة
                </button>
                <a href="{{route('export')}}" class="btn btn-default ml-5">
                    <button class="border bg-gray-300 p-2 rounded-lg hover:bg-gray-400 font-semibold">
                        تصدير
                        <i class="fa-solid fa-file-csv"></i>
                    </button>
                </a>
            </div>

            {{-- FILTER BUTTON --}}
            <div class="flex justify-end ml-5">
                <input placeholder="ادخل اسم رب الاسرة او الزوجة" wire:model="filter.search" class=" bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    @keydown.enter.prevent="$refresh" />
                <button  @click="filter = ! filter" class="w-16 mr-4  text-gray-200 bg-blue-700 rounded-lg "><i
                        class="fa-solid fa-filter"></i></button>
            </div>
        </div>
        {{-- FILTERS --}}
        <div x-show="filter" class="grid lg:grid-cols-3 sm:grid-cols-1 mb-5 ">
            <select wire:model="filter.city_id"
                class="mr-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="" >اختر المنطقة</option>
                @forelse ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @empty
                    <option value="">لا يوجد</option>
                @endforelse
            </select>
            <select  wire:model="filter.person.level"
                class="mr-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="" >مستوى الفقر</option>
                <option value="1">B1</option>
                <option value="2">B2</option>
                <option value="3">B3</option>
                <option value="4">B4</option>
            </select>
            <select  wire:model="filter.review"
                class="mr-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="" >الحالة</option>
                <option value="1" >تمت المراجعة</option>
                <option value="2">لم تتم المراجعة</option>
            </select>

        </div>

        {{-- ADD MODAL --}}
        <div id="form-modal" tabindex="-1" class="absolute top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 md:h-full">
            <div class="relative w-full max-w-4xl p-4 md:h-auto sm:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->

                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <div>
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                اضافة استمارة
                            </h3>
                        </div>
                        <div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="form-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal body -->
                    <div class="p-0 m-0">
                        @livewire('form.add')
                    </div>
                    <!-- Modal footer -->

                </div>
            </div>
        </div>

        <div x-show="addGiven" class="mb-3">
            <livewire:give.add />
        </div>


        <div class="grid gap-2 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            {{-- {{dg($forms['0']->head_family->is_mr_name)}} --}}
            @forelse ($forms as $form)
                <livewire:form.card :form="$form" key="form-{{now()}}-{{$form->id}}" />
            @empty
                <div class="col-span-3 mt-4 ">
                    <h1 class="text-center">لايوجد</h1>
                </div>
            @endforelse
        </div>
        <div class=" mt-2 p-2 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
            {{$forms->links()}}
        </div>
    </div>
</div>
{{-- <script>
    function exportTasks(_this) {
       let _url = $(_this).data('href');
       window.location.href = _url;
    }
 </script> --}}
