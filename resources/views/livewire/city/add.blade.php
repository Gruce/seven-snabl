<div>
    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-3 mt-5">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم المنطقة</label>
            <input wire:model.defer="city.name" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل اسم المنطقة" >
            @error('city.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> رمز المنطقة</label>
            <input wire:model.defer="city.code" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الرمز " >
            @error('city.code') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="mt-3">
        <button  wire:click="save" type="submit" class="w-full text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">اضافة</button>
    </div>
</div>
