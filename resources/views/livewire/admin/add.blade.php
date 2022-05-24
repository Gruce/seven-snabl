<div>
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> الاسم </label>
            <input wire:model.defer="user.name" type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
            @error('user.name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> البريد الالكتروني</label>
            <input wire:model.defer="user.email" type="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل البريد الالكتروني" >
            @error('user.email') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> ادخل كلمة المرور</label>
            <input wire:model.defer="user.password" type="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
            @error('user.password') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label  class="block mb-2 text-sm font-medium text-gray-900 ">نوع المستخدم</label>
            <select wire:model.defer="user.is_admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                <option selected>النوع</option>
                <option value="1">مشرف</option>
                <option value="2">مخول</option>
            </select>
            @error('user.is_admin') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> رقم الهاتف</label>
            <input wire:model.defer="user.phonenumber" type="number"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
        </div>
    </div>
    <button  wire:click="save" type="submit" class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">اضافة</button>

</div>
