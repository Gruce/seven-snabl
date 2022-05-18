<div class="relative overflow-x-auto  sm:rounded-lg mt-10" dir="rtl">
    <table class="w-full text-sm text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    اسم المستخدم
                </th>
                <th scope="col" class="px-6 py-3">
                    البريد الالكتروني
                </th>
                <th scope="col" class="px-6 py-3">
                    نوع المستخدم
                </th>
                <th scope="col" class="px-6 py-3">
                    رقم الهاتف
                </th>
                <th scope="col" class="px-6 py-3">
                    الاجراءات
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($user as $item)
                <tr class="bg-white  text-center">
                    <td class="px-6 py-4">
                        {{ $loop->index + 1 }}
                    </td>
                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$item->name}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-input class="w-64" wire:model.lazy="input.user.{{$item->index}}.name" type="text"/>
                            </ul>
                        </div>
                    </td>
                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$item->email}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-input class="w-64" wire:model.lazy="input.user.{{$loop->index}}.email" type="text"/>
                            </ul>
                        </div>
                    </td>

                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$item->is_admin}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-select

                                :options="[
                                        ['name'=> 'مشرف',   'id'=> true ],
                                        ['name'=> 'مخول', 'id'=> false ],
                                ]"
                                wire:model.lazy="input.user.{{$loop->index}}.is_admin"
                                option-label="name"
                                option-value="id"
                            />
                        </div>
                    </td>
                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$item->phonenumber}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-input class="w-64" wire:model.lazy="input.user.{{$loop->index}}.phonenumber" type="text"/>
                            </ul>
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <x-button wire:click="confirm({{$item->id}},'delete')" class="text-red" icon="trash" negative />
                    </td>
                </tr>
            @empty

                <td colspan="4" class="text-center">لايوجد</td>
            @endforelse
        </tbody>
    </table>
</div>
