<div>
    {{-- ADD MODAL --}}
    <div>
        <div class="grid grid-cols-1 gap-2">
            <h5 class="mr-4 font-semibold">
                نوع الهبة
            </h5>
            <input wire:model.defer="give.name" required type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم">
            @error('give.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>
        <button data-modal-toggle="givetype-modal" wire:click="save" type="button" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">اضافة</button>
    </div>
</div>