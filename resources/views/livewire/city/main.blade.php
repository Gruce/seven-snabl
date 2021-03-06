@section('title', 'المدن')

<div>
    <div class="mt-3">
        <div class="flex justify-between">
            <button class="block  w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="city-modal">
                اضافة
            </button>
            <input wire:model="searchCity" placeholder="البحث عن المدينة" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

        </div>
        {{-- ADD MODAL --}}
        <div wire:ignore id="city-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <div>
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                اضافة
                            </h3>
                        </div>
                        <div>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="city-modal">
                            <i class="fa-solid fa-xmark text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        @livewire('city.add')
                    </div>

                </div>
            </div>
        </div>
            <div>
                <livewire:city.show key={{now()}} />
            </div>
    </div>
</div>
