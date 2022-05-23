<div>
    <div class="grid grid-cols-1 gap-2">
        <h5 class="font-semibold ">
            نوع الهبة
        </h5>
        <input type="text" wire:model.defer="give.name" class="bg-white border col-span-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    </div>
    <button wire:click="save" type="button"
        class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">اضافة</button>
</div>
