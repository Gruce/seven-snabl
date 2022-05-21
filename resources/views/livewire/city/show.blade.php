<div class="relative overflow-x-auto  sm:rounded-lg mt-10" >
    <table class="w-full text-sm text-right text-gray-500 table-auto">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr class="text-center">
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    اسم المنطقة
                </th>
                <th scope="col" class="px-6 py-3">
                    الرمز
                </th>
                <th scope="col" class="px-6 py-3">
                    الاجراءات
                </th>
            </tr>
        </thead>
        <tbody>

            @forelse ($cities as $city)
                <tr class="bg-white  text-center">
                    <td class="px-6 py-4">
                        {{ $loop->index + 1 }}
                    </td>
                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$city->name}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.name" type="text"/>
                            </ul>
                        </div>
                    </td>
                    <td class="px-6 py-4">

                        <div x-data="{ open: false }">
                            <button  x-show="!open" @click="open = true">{{$city->code}} </button>

                            <ul x-show="open" @click.away="open = false">
                                <x-input class="w-64" wire:model.lazy="input.cities.{{$loop->index}}.code" type="text"/>
                            </ul>
                        </div>
                    </td>
                    <td class="px-6 py-4 ">
                        <x-button wire:click="confirm({{$city->id}},'delete')" class="text-red" icon="trash" negative />
                    </td>
                </tr>
            @empty

                <td colspan="4" class="text-center">لايوجد</td>
            @endforelse
        </tbody>
    </table>
</div>
