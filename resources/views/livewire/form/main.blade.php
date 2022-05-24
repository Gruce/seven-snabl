@section('title', 'الكشوفات')
<div>
    <div class="mt-3" x-data="{ open: false, filter: false }">
        <div class="grid p-2 mb-3 rounded lg:grid-cols-2 sm:grid-cols-1 bg-slate-50">
            {{-- ADD --}}
            <div class="flex justify-start">
                <button class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="large-modal">
                    اضافة
                </button>
            </div>

            {{-- FILTER BUTTON --}}
            <div class="flex justify-end">
                <x-input placeholder="البحث عن رقم الاستمارة" wire:model="filter.search"
                    @keydown.enter.prevent="$refresh" />
                <button @click="filter = ! filter" class="text-gray-900 bg-gray-400 rounded-sm w-16 mr-4"><i
                        class="fa-solid fa-filter"></i></button>
            </div>
        </div>
        {{-- FILTERS --}}
        <div x-show="filter" class="grid lg:grid-cols-3 sm:grid-cols-1 ">
            <x-select class="{{ $filter['city_id'] ? 'border-2 border-green-100 rounded-lg' : '' }} "
                placeholder="المنطقة" :async-data="route('cities_select')" option-label="name" option-value="id"
                wire:model="filter.city_id" />
            <select  wire:model="filter.person.level"
                class=" bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2  ">
                <option value="1" selected>B1</option>
                <option value="2">B2</option>
                <option value="3">B3</option>
                <option value="4">B4</option>
            </select>
            <select  wire:model="filter.review"
                class=" bg-white border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 mr-2  ">
                <option value="2" selected>تمت المراجعة</option>
                <option value="1">لم تتم المراجعة</option>
            </select>

        </div>

        {{-- ADD MODAL --}}
        <div id="large-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-2 md:h-full">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            اضافة استمارة
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        @livewire('form.add')
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid gap-2 xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @forelse ($forms as $form)
                <div class="mb-1 mt-5">
                    @livewire('form.card', ['form' => $form])
                </div>
            @empty
                <div>
                    <h1>لايوجد</h1>
                </div>
            @endforelse
        </div>

        {{-- {{ $forms->links() }} --}}
    </div>

    @livewire('give.add', ['form' => $form_id ?? 1])
</div>
