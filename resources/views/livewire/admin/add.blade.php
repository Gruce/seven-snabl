<div>
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <x-input wire:model.defer="user.name" label=" اسم المستخدم" placeholder="ادخل اسم المستخدم  " />
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> البريد الالكترون</label>
            <input wire:model.defer="user.email" type="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> ادخل كلمة المرور</label>
            <input wire:model.defer="user.password" type="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
        </div>
        <div>
            <label  class="block mb-2 text-sm font-medium text-gray-900 ">نوع المستخدم</label>
            <select wire:model.defer="user.is_admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 px-8">
                <option value="1">مشرف</option>
                <option value="2">مخول</option>
            </select>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> رقم الهاتف</label>
            <input wire:model.defer="user.phonenumber" type="number"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ادخل الاسم" >
        </div>
    </div>
    <button  wire:click="save" type="submit" class="block text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 mt-4">اضافة</button>
</div>
